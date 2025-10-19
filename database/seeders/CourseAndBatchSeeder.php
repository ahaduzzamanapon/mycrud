<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CourseAndBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks to truncate tables
        Schema::disableForeignKeyConstraints();
        Batch::truncate();
        Course::truncate();
        Schema::enableForeignKeyConstraints();

        // Create Parent Courses
        $course1 = Course::create(['name' => 'Bank Job Preparation', 'description' => 'Comprehensive preparation for all bank jobs.']);
        $course2 = Course::create(['name' => 'IT Special Batch', 'description' => 'Specialized IT training for bank job aspirants.']);
        $course3 = Course::create(['name' => 'Basic Course (Math + English)', 'description' => 'Strengthen fundamentals in Math and English.']);
        $course4 = Course::create(['name' => 'O.G Crash Course', 'description' => 'Intensive crash course for quick preparation.']);

        // Prepare Batches from user data
        $batches = [
            // Course 1
            ['course_id' => $course1->id, 'name' => '২৪ তম ব্যাচ (রাত ৮ টায়) রেগুলার (প্রিলি. + রিটেন)(Upcoming New Batch)', 'start_date' => '2025-08-05', 'end_date' => '2026-01-05'],
            // Course 2
            ['course_id' => $course2->id, 'name' => 'IT Special Batch-01(Only Bank Job)', 'start_date' => '2025-09-20', 'end_date' => '2026-01-20'],
            // Course 3
            ['course_id' => $course3->id, 'name' => 'Basic Course (Math +English)-01', 'start_date' => '2025-10-10', 'end_date' => '2025-12-10'],
            // Course 4
            ['course_id' => $course4->id, 'name' => 'O.G Crash Course', 'start_date' => '2025-10-01', 'end_date' => '2025-10-31'],
        ];
        
        // Add the repeated batches
        for ($i = 2; $i <= 8; $i++) {
            $batches[] = ['course_id' => $course1->id, 'name' => 'Batch ' . $i . ' - ' . $course1->name, 'start_date' => now()->addMonths($i), 'end_date' => now()->addMonths($i + 2)];
            $batches[] = ['course_id' => $course2->id, 'name' => 'Batch ' . $i . ' - ' . $course2->name, 'start_date' => now()->addMonths($i), 'end_date' => now()->addMonths($i + 2)];
            $batches[] = ['course_id' => $course3->id, 'name' => 'Batch ' . $i . ' - ' . $course3->name, 'start_date' => now()->addMonths($i), 'end_date' => now()->addMonths($i + 2)];
            $batches[] = ['course_id' => $course4->id, 'name' => 'Batch ' . $i . ' - ' . $course4->name, 'start_date' => now()->addMonths($i), 'end_date' => now()->addMonths($i + 1)];
        }

        DB::table('batches')->insert($batches);

        $this->command->info('Courses and Batches seeded from user data.');
    }
}
