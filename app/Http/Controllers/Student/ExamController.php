<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $student = Auth::guard('student')->user();
        $exams = $student->exams()->with('questionPaper')->get()->map(function ($exam) use ($student) {
            $exam->status = 'upcoming';
            $exam->can_start = false;
            $exam->has_taken = Result::where('student_id', $student->id)->where('exam_id', $exam->id)->exists();

            if ($exam->has_taken) {
                $exam->status = 'completed';
            } elseif (Carbon::now()->between($exam->start_time, $exam->end_time)) {
                $exam->status = 'active';
                $exam->can_start = true;
            } elseif (Carbon::now()->greaterThan($exam->end_time)) {
                $exam->status = 'ended';
            }
            // Add ISO formatted times for JavaScript
            $exam->start_time_iso = $exam->start_time->toISOString();
            $exam->end_time_iso = $exam->end_time->toISOString();

            // Debugging logs for server-side
            \Log::debug('--- Server-side Exam ID: ' . $exam->id . ' ---');
            \Log::debug('APP_TIMEZONE from env(): ' . env('APP_TIMEZONE'));
            \Log::debug('Laravel App Timezone: ' . config('app.timezone'));
            \Log::debug('Carbon::now() (server): ' . Carbon::now()->toDateTimeString() . ' (' . Carbon::now()->timezoneName . ')');
            \Log::debug('Exam Start Time (DB): ' . $exam->start_time->toDateTimeString() . ' (' . $exam->start_time->timezoneName . ')');
            \Log::debug('Exam End Time (DB): ' . $exam->end_time->toDateTimeString() . ' (' . $exam->end_time->timezoneName . ')');
            \Log::debug('Exam Start Time (ISO): ' . $exam->start_time_iso);
            \Log::debug('Exam End Time (ISO): ' . $exam->end_time_iso);
            \Log::debug('Server-side can_start: ' . (Carbon::now()->between($exam->start_time, $exam->end_time) ? 'true' : 'false'));

            return $exam;
        });

        return view('student.exams.index', compact('exams'));
    }

    public function startExam(Exam $exam)
    {
        $student = Auth::guard('student')->user();

        // Check if student has already taken the exam
        if (Result::where('student_id', $student->id)->where('exam_id', $exam->id)->exists()) {
            return redirect()->route('student.exams.index')->with('error', 'You have already taken this exam.');
        }

        // Check if exam is active
        if (!Carbon::now()->between($exam->start_time, $exam->end_time)) {
            return redirect()->route('student.exams.index')->with('error', 'This exam is not currently active.');
        }

        $exam->load(['questionPaper.questions.options']);

        return view('student.exams.take', compact('exam'));
    }

    public function submitExam(Request $request, Exam $exam)
    {
        $student = Auth::guard('student')->user();

        // Prevent multiple submissions
        if (Result::where('student_id', $student->id)->where('exam_id', $exam->id)->exists()) {
            return redirect()->route('student.exams.index')->with('error', 'You have already submitted this exam.');
        }

        $exam->load(['questionPaper.questions.options']);
        $score = 0;
        $totalMarks = 0;

        foreach ($exam->questionPaper->questions as $question) {
            $totalMarks += $question->pivot->marks;
            $submittedAnswers = $request->input('answers.' . $question->id, []);

            if (!is_array($submittedAnswers)) {
                $submittedAnswers = [$submittedAnswers];
            }

            $correctOptions = $question->options->where('is_correct', true);
            $correctAnswerIds = $correctOptions->pluck('id')->toArray();

            $isCorrect = false;
            $marksObtained = 0;

            if ($question->type == 'single') {
                // For single choice, check if the single submitted answer matches the single correct answer
                if (count($submittedAnswers) == 1 && in_array($submittedAnswers[0], $correctAnswerIds)) {
                    $isCorrect = true;
                    $marksObtained = $question->pivot->marks;
                }
            } else { // multiple
                // For multiple choice, check if all correct answers are selected and no incorrect ones
                if (empty(array_diff($submittedAnswers, $correctAnswerIds)) && empty(array_diff($correctAnswerIds, $submittedAnswers))) {
                    $isCorrect = true;
                    $marksObtained = $question->pivot->marks;
                }
            }

            StudentAnswer::create([
                'exam_id' => $exam->id,
                'student_id' => $student->id,
                'question_id' => $question->id,
                'option_id' => ($question->type == 'single' && count($submittedAnswers) == 1) ? $submittedAnswers[0] : null,
                'option_ids' => ($question->type == 'multiple') ? json_encode($submittedAnswers) : null,
                'is_correct' => $isCorrect,
                'marks_obtained' => $marksObtained,
            ]);

            $score += $marksObtained;
        }

        Result::create([
            'exam_id' => $exam->id,
            'student_id' => $student->id,
            'score' => $score,
            'total_marks' => $totalMarks,
        ]);

        return redirect()->route('student.exams.result', $exam->id)->with('success', 'Exam submitted successfully!');
    }

    public function showResult(Exam $exam)
    {
        $student = Auth::guard('student')->user();
        $result = Result::where('exam_id', $exam->id)->where('student_id', $student->id)->firstOrFail();
        return view('student.exams.result', compact('exam', 'result'));
    }
}