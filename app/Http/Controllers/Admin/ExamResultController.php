<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Result;
use App\Models\Student;
use App\Models\StudentAnswer;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index(Request $request)
    {
        $exams = Exam::all();
        $students = Student::all();

        $resultsQuery = Result::with(['exam', 'student']);

        if ($request->filled('exam_id')) {
            $resultsQuery->where('exam_id', $request->exam_id);
        }

        if ($request->filled('student_id')) {
            $resultsQuery->where('student_id', $request->student_id);
        }

        $results = $resultsQuery->get();

        return view('admin.exam_results.index', compact('results', 'exams', 'students'));
    }

    public function showAnswerPaper(Result $result)
    {
        $result->load(['exam.questionPaper.questions.options', 'student', 'studentAnswers']);

        // Map student answers to questions for easier display
        $studentAnswersMap = $result->studentAnswers->keyBy('question_id');

        return view('admin.exam_results.answer_paper', compact('result', 'studentAnswersMap'));
    }
}