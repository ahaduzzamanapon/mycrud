<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Branch;
use App\Models\FrontendManagerCourse;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showPromotion(Promotion $promotion)
    {
        return view('promotion_details', compact('promotion'));
    }

    public function showBranchCourses(Branch $branch)
    {
        $courses = $branch->categories()->with('courses')->get()->pluck('courses')->flatten();
        return view('frontend.branch_courses.index', compact('branch', 'courses'));
    }

    public function showCategoryCourses(Category $category)
    {
        $courses = $category->courses;
        return view('frontend.category_courses.index', compact('category', 'courses'));
    }

    public function showCourseDetail(FrontendManagerCourse $course)
    {
        return view('frontend.courses.show', compact('course'));
    }
}