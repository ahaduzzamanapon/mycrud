<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionPaper;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionPaperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $questionPapers = QuestionPaper::all();
        return view('admin.question_papers.index', compact('questionPapers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $questions = Question::with('subject')->get();
        return view('admin.question_papers.create', compact('subjects', 'questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:question_papers',
            'questions' => 'required|array|min:1',
            'questions.*.id' => 'required|exists:questions,id',
            'questions.*.marks' => 'required|numeric|min:0.5',
        ]);

        DB::transaction(function () use ($request) {
            $questionPaper = QuestionPaper::create([
                'name' => $request->name,
            ]);

            $questionsData = [];
            foreach ($request->questions as $q) {
                $questionsData[$q['id']] = ['marks' => $q['marks']];
            }
            $questionPaper->questions()->attach($questionsData);
        });

        return redirect()->route('admin.question_papers.index')->with('success', 'Question Paper created successfully.');
    }

    public function edit(QuestionPaper $questionPaper)
    {
        $subjects = Subject::all();
        $allQuestions = Question::with('subject')->get();
        $selectedQuestions = $questionPaper->questions->keyBy('id');
        return view('admin.question_papers.edit', compact('questionPaper', 'subjects', 'allQuestions', 'selectedQuestions'));
    }

    public function update(Request $request, QuestionPaper $questionPaper)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:question_papers,name,' . $questionPaper->id,
            'questions' => 'required|array|min:1',
            'questions.*.id' => 'required|exists:questions,id',
            'questions.*.marks' => 'required|numeric|min:0.5',
        ]);

        DB::transaction(function () use ($request, $questionPaper) {
            $questionPaper->update([
                'name' => $request->name,
            ]);

            $questionsData = [];
            foreach ($request->questions as $q) {
                $questionsData[$q['id']] = ['marks' => $q['marks']];
            }
            $questionPaper->questions()->sync($questionsData);
        });

        return redirect()->route('admin.question_papers.index')->with('success', 'Question Paper updated successfully.');
    }

    public function destroy(QuestionPaper $questionPaper)
    {
        $questionPaper->delete(); // Detaches questions due to cascade on pivot table
        return redirect()->route('admin.question_papers.index')->with('success', 'Question Paper deleted successfully.');
    }

    public function generateForm()
    {
        $subjects = Subject::withCount('questions')->get();
        return view('admin.question_papers.generate', compact('subjects'));
    }

    public function generateStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:question_papers',
            'total_questions' => 'required|integer|min:1',
            'subject_questions' => 'nullable|array',
            'subject_questions.*' => 'nullable|integer|min:0',
        ]);

        $totalRequestedQuestions = array_sum($request->subject_questions);
        if ($totalRequestedQuestions > $request->total_questions) {
            return back()->withErrors(['total_questions' => 'Total questions requested from subjects exceed the overall total questions.']);
        }

        DB::transaction(function () use ($request) {
            $questionPaper = QuestionPaper::create([
                'name' => $request->name,
            ]);

            $selectedQuestionIds = [];
            $remainingQuestionsToSelect = $request->total_questions;

            // Select questions per subject
            foreach ($request->subject_questions as $subjectId => $count) {
                if ($count > 0) {
                    $questions = Question::where('subject_id', $subjectId)->inRandomOrder()->limit($count)->pluck('id');
                    $selectedQuestionIds = array_merge($selectedQuestionIds, $questions->toArray());
                    $remainingQuestionsToSelect -= $questions->count();
                }
            }

            // If more questions are needed, select randomly from remaining available questions
            if ($remainingQuestionsToSelect > 0) {
                $additionalQuestions = Question::whereNotIn('id', $selectedQuestionIds)
                                            ->inRandomOrder()
                                            ->limit($remainingQuestionsToSelect)
                                            ->pluck('id');
                $selectedQuestionIds = array_merge($selectedQuestionIds, $additionalQuestions->toArray());
            }

            // Attach questions with default marks
            $questionsData = [];
            foreach ($selectedQuestionIds as $qId) {
                $questionsData[$qId] = ['marks' => 1]; // Default 1 mark per question
            }
            $questionPaper->questions()->attach($questionsData);
        });

        return redirect()->route('admin.question_papers.index')->with('success', 'Question Paper generated successfully.');
    }
}
