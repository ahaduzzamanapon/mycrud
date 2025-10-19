<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $pendingEnrollments = Enrollment::with(['student', 'course', 'batch', 'paymentMethod'])->where('status', 'pending')->get();
        return view('admin.enrollments.index', compact('pendingEnrollments'));
    }

    public function approve(Enrollment $enrollment)
    {
        // Update enrollment status
        $enrollment->status = 'approved';
        $enrollment->save();

        // Attach student to the batch
        $enrollment->student->batches()->syncWithoutDetaching([$enrollment->batch_id]);

        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment approved successfully.');
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->status = 'rejected';
        $enrollment->save();

        return redirect()->route('admin.enrollments.index')->with('success', 'Enrollment rejected.');
    }
}