<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $batches = Batch::with('course')->get();
        return view('admin.batches.index', compact('batches'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.batches.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        Batch::create($request->all());

        return redirect()->route('admin.batches.index')->with('success', 'Batch created successfully.');
    }

    public function edit(Batch $batch)
    {
        $courses = Course::all();
        return view('admin.batches.edit', compact('batch', 'courses'));
    }

    public function update(Request $request, Batch $batch)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $batch->update($request->all());

        return redirect()->route('admin.batches.index')->with('success', 'Batch updated successfully.');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('admin.batches.index')->with('success', 'Batch deleted successfully.');
    }
}