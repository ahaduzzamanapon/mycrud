<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 20 students
        $students = Student::factory()->count(20)->create();

        // Assign students to random batches
        $batches = Batch::all();

        if ($batches->count() > 0) {
            $students->each(function ($student) use ($batches) {
                $student->batches()->attach(
                    $batches->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
        }

        $this->command->info('Students created and assigned to batches.');
    }
}