<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Models\Course;
use Illuminate\Support\Facades\Response;

class StudentListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $students = Student::with('batches')->get();
        return view('admin.students.index', compact('students'));
    }

    public function manage(Student $student)
    {
        $batches = Batch::with('course')->get();
        $assignedBatches = $student->batches->pluck('id')->toArray();
        return view('admin.students.manage', compact('student', 'batches', 'assignedBatches'));
    }

    public function assignBatches(Request $request, Student $student)
    {
        $request->validate([
            'batches' => 'nullable|array',
            'batches.*' => 'exists:batches,id',
        ]);

        $student->batches()->sync($request->batches);

        return redirect()->route('admin.students.index')->with('success', 'Student batch assignments updated successfully.');
    }

    public function report(Request $request)
    {
        $courses = Course::all();
        $batches = Batch::all();
        $students = collect(); // Empty collection by default

        if ($request->isMethod('post')) {
            $query = Student::with('batches.course');

            if ($request->filled('course_id')) {
                $query->whereHas('batches.course', function ($q) use ($request) {
                    $q->where('id', $request->course_id);
                });
            }

            if ($request->filled('batch_id')) {
                $query->whereHas('batches', function ($q) use ($request) {
                    $q->where('id', $request->batch_id);
                });
            }

            $students = $query->get();

            if ($request->has('export')) {
                return $this->exportCsv($students);
            }
        }

        return view('admin.students.report', compact('students', 'courses', 'batches'));
    }

    private function exportCsv($students)
    {
        $fileName = 'student_admission_report.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Name', 'Email', 'Phone', 'Address', 'Enrolled Batches'];

        $callback = function() use($students, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($students as $student) {
                $row['Name']  = $student->name;
                $row['Email'] = $student->email;
                $row['Phone'] = $student->phone_number;
                $row['Address'] = $student->address;
                $row['Enrolled Batches'] = $student->batches->pluck('name')->implode(', ');

                fputcsv($file, array($row['Name'], $row['Email'], $row['Phone'], $row['Address'], $row['Enrolled Batches']));
            }

            fclose($file);
        };

        return Response::stream($callback, 200, headers: $headers);
    }
}