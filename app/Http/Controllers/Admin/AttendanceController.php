<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function create()
    {
        $employees = User::where('user_type', 'employee')->get();
        $students = Student::all();
        return view('admin.attendance.create', compact('employees', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
        ]);

        foreach ($request->attendance as $attendableType => $attendances) {
            foreach ($attendances as $attendableId => $status) {
                $model = ($attendableType == 'employee') ? User::class : Student::class;
                Attendance::updateOrCreate(
                    [
                        'attendable_id' => $attendableId,
                        'attendable_type' => $model,
                        'date' => $request->date,
                    ],
                    [
                        'status' => $status,
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Attendance saved successfully!');
    }

    public function report(Request $request)
    {
        $attendances = collect(); // Empty collection by default

        if ($request->isMethod('post')) {
            $query = Attendance::with('attendable');

            if ($request->filled('date_from')) {
                $query->where('date', '>=', $request->date_from);
            }

            if ($request->filled('date_to')) {
                $query->where('date', '<=', $request->date_to);
            }

            if ($request->filled('user_type')) {
                if ($request->user_type === 'employee') {
                    $query->where('attendable_type', User::class);
                } elseif ($request->user_type === 'student') {
                    $query->where('attendable_type', Student::class);
                }
            }

            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            $attendances = $query->get();

            if ($request->has('export')) {
                return $this->exportCsv($attendances);
            }
        }

        return view('admin.attendance.report', compact('attendances'));
    }

    private function exportCsv($attendances)
    {
        $fileName = 'attendance_report.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Date', 'Name', 'Type', 'Status', 'Remarks'];

        $callback = function() use($attendances, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($attendances as $attendance) {
                $row['Date']  = $attendance->date;
                $row['Name']    = $attendance->attendable->name ?? 'N/A';
                $row['Type']    = str_replace('App\\Models\\', '', $attendance->attendable_type);
                $row['Status']  = $attendance->status;
                $row['Remarks'] = $attendance->remarks;

                fputcsv($file, array($row['Date'], $row['Name'], $row['Type'], $row['Status'], $row['Remarks']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}