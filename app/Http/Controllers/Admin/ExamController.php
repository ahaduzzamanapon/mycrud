<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\QuestionPaper;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $exams = Exam::with(['questionPaper', 'students'])->get();
        return view('admin.exams.index', compact('exams'));
    }

    public function create()
    {
        $questionPapers = QuestionPaper::all();
        $students = Student::all();
        return view('admin.exams.create', compact('questionPapers', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'question_paper_id' => 'required|exists:question_papers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'students' => 'required|array|min:1',
            'students.*' => 'exists:students,id',
        ]);

        DB::transaction(function () use ($request) {
            $exam = Exam::create([
                'name' => $request->name,
                'question_paper_id' => $request->question_paper_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);

            $exam->students()->attach($request->students);
        });

        return redirect()->route('admin.exams.index')->with('success', 'Exam created successfully.');
    }

    public function edit(Exam $exam)
    {
        $questionPapers = QuestionPaper::all();
        $students = Student::all();
        $assignedStudents = $exam->students->pluck('id')->toArray();
        return view('admin.exams.edit', compact('exam', 'questionPapers', 'students', 'assignedStudents'));
    }

    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'question_paper_id' => 'required|exists:question_papers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'students' => 'required|array|min:1',
            'students.*' => 'exists:students,id',
        ]);

        DB::transaction(function () use ($request, $exam) {
            $exam->update([
                'name' => $request->name,
                'question_paper_id' => $request->question_paper_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);

            $exam->students()->sync($request->students);
        });

        return redirect()->route('admin.exams.index')->with('success', 'Exam updated successfully.');
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('admin.exams.index')->with('success', 'Exam deleted successfully.');
    }

    public function showResults(Exam $exam)
    {
        $exam->load(['results.student', 'questionPaper.questions']);
        return view('admin.exams.results', compact('exam'));
    }
}