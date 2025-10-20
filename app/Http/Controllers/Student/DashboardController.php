<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function index()
    {
        $student = Auth::guard('student')->user();

        // Courses Enrolled
        $coursesEnrolled = Enrollment::where('student_id', $student->id)->count();

        // Assignments Due (Hardcoded for now)
        $assignmentsDue = 2;

        // Profile Completion
        $profileCompletion = 0;
        $profileFields = ['name', 'email', 'phone', 'address', 'image'];
        $filledFields = 0;
        foreach ($profileFields as $field) {
            if (!empty($student->$field)) {
                $filledFields++;
            }
        }
        if (count($profileFields) > 0) {
            $profileCompletion = ($filledFields / count($profileFields)) * 100;
        }

        // Course Progress Chart
        $enrolledCourses = Enrollment::where('student_id', $student->id)->with('course')->get();
        $courseNames = [];
        $courseProgress = [];

        foreach ($enrolledCourses as $enrollment) {
            $courseNames[] = $enrollment->course->name;
            $results = Result::where('student_id', $student->id)->where('course_id', $enrollment->course_id)->get();
            $totalMarks = $results->sum('total_marks');
            $obtainedMarks = $results->sum('obtained_marks');
            $progress = 0;
            if ($totalMarks > 0) {
                $progress = ($obtainedMarks / $totalMarks) * 100;
            }
            $courseProgress[] = $progress;
        }

        return view('student.dashboard', compact(
            'coursesEnrolled',
            'assignmentsDue',
            'profileCompletion',
            'courseNames',
            'courseProgress'
        ));
    }
}