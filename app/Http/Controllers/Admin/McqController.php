<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class McqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $questions = Question::with(['options', 'subject'])->get();
        return view('admin.mcqs.index', compact('questions'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.mcqs.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string',
            'subject_id' => 'required|exists:subjects,id',
            'type' => 'required|in:single,multiple',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'correct_answer' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $question = Question::create([
                'question_text' => $request->question_text,
                'subject_id' => $request->subject_id,
                'type' => $request->type,
            ]);

            foreach ($request->options as $key => $optionText) {
                $isCorrect = false;
                if ($request->type == 'single') {
                    if ($key == $request->correct_answer) {
                        $isCorrect = true;
                    }
                } else { // multiple
                    if (in_array($key, $request->correct_answer)) {
                        $isCorrect = true;
                    }
                }

                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionText,
                    'is_correct' => $isCorrect,
                ]);
            }
        });

        return redirect()->route('admin.mcqs.index')->with('success', 'MCQ created successfully.');
    }

    public function edit(Question $mcq)
    {
        $mcq->load('options');
        $subjects = Subject::all();
        return view('admin.mcqs.edit', compact('mcq', 'subjects'));
    }

    public function update(Request $request, Question $mcq)
    {
        $request->validate([
            'question_text' => 'required|string',
            'subject_id' => 'required|exists:subjects,id',
            'type' => 'required|in:single,multiple',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'correct_answer' => 'required',
        ]);

        DB::transaction(function () use ($request, $mcq) {
            $mcq->update([
                'question_text' => $request->question_text,
                'subject_id' => $request->subject_id,
                'type' => $request->type,
            ]);

            // Delete old options
            $mcq->options()->delete();

            // Create new options
            foreach ($request->options as $key => $optionText) {
                $isCorrect = false;
                if ($request->type == 'single') {
                    if ($key == $request->correct_answer) {
                        $isCorrect = true;
                    }
                } else { // multiple
                    if (in_array($key, $request->correct_answer)) {
                        $isCorrect = true;
                    }
                }

                Option::create([
                    'question_id' => $mcq->id,
                    'option_text' => $optionText,
                    'is_correct' => $isCorrect,
                ]);
            }
        });

        return redirect()->route('admin.mcqs.index')->with('success', 'MCQ updated successfully.');
    }

    public function destroy(Question $mcq)
    {
        $mcq->delete(); // Options will be deleted by cascade constraint
        return redirect()->route('admin.mcqs.index')->with('success', 'MCQ deleted successfully.');
    }
}
