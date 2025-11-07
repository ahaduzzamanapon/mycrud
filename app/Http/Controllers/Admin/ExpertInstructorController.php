<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpertInstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertInstructors = \App\Models\ExpertInstructor::all();
        return view('admin.expert_instructors.index', compact('expertInstructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expert_instructors.create');
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
            'image' => 'required|image',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/expert_instructors'), $imageName);

        \App\Models\ExpertInstructor::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'youtube_link' => $request->youtube_link,
        ]);

        return redirect()->route('admin.expert_instructors.index')->with('success', 'Expert instructor created successfully.');
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
        $expertInstructor = \App\Models\ExpertInstructor::findOrFail($id);
        return view('admin.expert_instructors.edit', compact('expertInstructor'));
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
            'image' => 'image',
        ]);

        $expertInstructor = \App\Models\ExpertInstructor::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/expert_instructors'), $imageName);
            $expertInstructor->image = $imageName;
        }

        $expertInstructor->title = $request->title;
        $expertInstructor->description = $request->description;
        $expertInstructor->youtube_link = $request->youtube_link;
        $expertInstructor->save();

        return redirect()->route('admin.expert_instructors.index')->with('success', 'Expert instructor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expertInstructor = \App\Models\ExpertInstructor::findOrFail($id);
        $expertInstructor->delete();

        return redirect()->route('admin.expert_instructors.index')->with('success', 'Expert instructor deleted successfully.');
    }
}
