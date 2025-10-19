<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function create()
    {
        $courses = Course::all();
        $batches = Batch::with('course')->get();
        $paymentMethods = PaymentMethod::all();
        return view('student.enroll.create', compact('courses', 'batches', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'batch_id' => 'required|exists:batches,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'transaction_number' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'amount' => 'required|numeric|min:0',
        ]);

        Enrollment::create([
            'student_id' => Auth::id(),
            'course_id' => $request->course_id,
            'batch_id' => $request->batch_id,
            'payment_method_id' => $request->payment_method_id,
            'transaction_number' => $request->transaction_number,
            'phone_number' => $request->phone_number,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return redirect()->route('student.enroll.create')->with('success', 'Enrollment request submitted successfully! It is now pending approval.');
    }
}