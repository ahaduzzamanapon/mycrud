<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseOutlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseOutlines = \App\Models\CourseOutline::all();
        return view('admin.course_outlines.index', compact('courseOutlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course_outlines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pdf_path' => 'required|mimes:pdf',
        ]);

        $pdfPath = uploadFile($request->file('pdf_path'), 'course_outlines');

        \App\Models\CourseOutline::create([
            'title' => $request->title,
            'pdf_path' => $pdfPath,
        ]);

        return redirect()->route('admin.course_outlines.index')->with('success', 'Course outline created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courseOutline = \App\Models\CourseOutline::findOrFail($id);
        return view('admin.course_outlines.edit', compact('courseOutline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'pdf_path' => 'mimes:pdf',
        ]);

        $courseOutline = \App\Models\CourseOutline::findOrFail($id);

        if ($request->hasFile('pdf_path')) {
            $pdfPath = uploadFile($request->file('pdf_path'), 'course_outlines');
            $courseOutline->pdf_path = $pdfPath;
        }

        $courseOutline->title = $request->title;
        $courseOutline->save();

        return redirect()->route('admin.course_outlines.index')->with('success', 'Course outline updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseOutline = \App\Models\CourseOutline::findOrFail($id);
        $courseOutline->delete();

        return redirect()->route('admin.course_outlines.index')->with('success', 'Course outline deleted successfully.');
    }
}
