<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalStudents = \App\Models\Student::count();
        $totalCourses = \App\Models\Course::count();
        $totalEnrollments = \App\Models\Enrollment::count();
        $totalExams = \App\Models\Exam::count();
        $totalSubjects = \App\Models\Subject::count();
        $totalQuestions = \App\Models\Question::count();
        $totalUsers = \App\Models\User::count();
        $totalTransactions = \App\Models\Transaction::count();

        // Enrollments per month
        $enrollmentsPerMonth = \App\Models\Enrollment::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('count(*) as count')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $enrollmentLabels = [];
        $enrollmentData = [];
        foreach ($enrollmentsPerMonth as $enrollment) {
            $enrollmentLabels[] = date('F', mktime(0, 0, 0, $enrollment->month, 1));
            $enrollmentData[] = $enrollment->count;
        }

        // Course Popularity
        $coursePopularity = \App\Models\Enrollment::with('course')
            ->select('course_id', DB::raw('count(*) as count'))
            ->groupBy('course_id')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        $coursePopularityLabels = [];
        $coursePopularityData = [];
        foreach ($coursePopularity as $enrollment) {
            $coursePopularityLabels[] = $enrollment->course->name;
            $coursePopularityData[] = $enrollment->count;
        }


        return view('dashboard', compact(
            'totalStudents',
            'totalCourses',
            'totalEnrollments',
            'totalExams',
            'totalSubjects',
            'totalQuestions',
            'totalUsers',
            'totalTransactions',
            'enrollmentLabels',
            'enrollmentData',
            'coursePopularityLabels',
            'coursePopularityData'
        ));
    }
}
