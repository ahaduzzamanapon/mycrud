<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendManagerCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = \App\Models\FrontendManagerCourse::with('category')->get();
        return view('admin.frontend_manager_courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = \App\Models\Branch::all();
        return view('admin.frontend_manager_courses.create', compact('branches'));
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
            'category_id' => 'required|exists:frontend_manager_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'real_amount' => 'required|numeric',
            'discount_amount' => 'nullable|numeric',
            'offer_expire_date' => 'nullable|date',
            'course_duration' => 'required|string|max:255',
            'total_lecture' => 'required|integer',
            'total_exam' => 'required|integer',
            'live_class' => 'required|string|max:255',
            'course_includes' => 'nullable|string',
            'description' => 'required|string',
            'instructors' => 'nullable|string',
            'routine' => 'nullable|string',
        ]);

        $course = new \App\Models\FrontendManagerCourse($request->except(['image', 'course_includes', 'instructors']));

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/courses'), $imageName);
            $course->image = 'images/courses/'.$imageName;
        }

        $course->course_includes = json_encode(array_filter(explode("\n", $request->input('course_includes'))));
        $course->instructors = json_encode(array_filter(explode("\n", $request->input('instructors'))));

        $course->save();

        return redirect()->route('admin.frontend_manager_courses.index')->with('success', 'Course created successfully.');
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
        $course = \App\Models\FrontendManagerCourse::findOrFail($id);
        $branches = \App\Models\Branch::all();
        return view('admin.frontend_manager_courses.edit', compact('course', 'branches'));
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
            'category_id' => 'required|exists:frontend_manager_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'real_amount' => 'required|numeric',
            'discount_amount' => 'nullable|numeric',
            'offer_expire_date' => 'nullable|date',
            'course_duration' => 'required|string|max:255',
            'total_lecture' => 'required|integer',
            'total_exam' => 'required|integer',
            'live_class' => 'required|string|max:255',
            'course_includes' => 'nullable|string',
            'description' => 'required|string',
            'instructors' => 'nullable|string',
            'routine' => 'nullable|string',
        ]);

        $course = \App\Models\FrontendManagerCourse::findOrFail($id);
        $course->fill($request->except(['image', 'course_includes', 'instructors']));

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image && file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/courses'), $imageName);
            $course->image = 'images/courses/'.$imageName;
        }

        $course->course_includes = json_encode(array_filter(explode("\n", $request->input('course_includes'))));
        $course->instructors = json_encode(array_filter(explode("\n", $request->input('instructors'))));

        $course->save();

        return redirect()->route('admin.frontend_manager_courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id)
    {
        $course = \App\Models\FrontendManagerCourse::findOrFail($id);
        // Delete image if exists
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }
        $course->delete();

        return redirect()->route('admin.frontend_manager_courses.index')->with('success', 'Course deleted successfully.');
    }

    public function getCourses(\App\Models\Category $category)
    {
        return response()->json($category->courses);
    }
}
