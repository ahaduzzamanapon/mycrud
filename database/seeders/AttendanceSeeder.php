<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = User::where('user_type', 'employee')->get();
        $students = Student::all();
        $statuses = ['Present', 'Present', 'Present', 'Present', 'Present', 'Absent', 'Leave']; // Skew towards present

        // Seed attendance for the last 30 days
        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays($i);

            foreach ($employees as $employee) {
                Attendance::create([
                    'attendable_id' => $employee->id,
                    'attendable_type' => User::class,
                    'date' => $date,
                    'status' => $statuses[array_rand($statuses)],
                ]);
            }

            foreach ($students as $student) {
                Attendance::create([
                    'attendable_id' => $student->id,
                    'attendable_type' => Student::class,
                    'date' => $date,
                    'status' => $statuses[array_rand($statuses)],
                ]);
            }
        }

        $this->command->info('Attendance records created for the last 30 days.');
    }
}