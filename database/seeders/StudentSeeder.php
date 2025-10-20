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

        $this->command->info('Students created and assigned to batches.');
    }
}