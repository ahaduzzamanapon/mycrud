<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class McqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = Subject::all();

        if ($subjects->isEmpty()) {
            $this->command->error('Please run the SubjectSeeder first!');
            return;
        }

        // Question 1: Single Choice (General Knowledge)
        $q1 = Question::create([
            'question_text' => 'What is the capital of France?',
            'type' => 'single',
            'subject_id' => $subjects->where('name', 'General Knowledge')->first()->id ?? $subjects->random()->id,
        ]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Berlin', 'is_correct' => false]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Madrid', 'is_correct' => false]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Paris', 'is_correct' => true]);
        Option::create(['question_id' => $q1->id, 'option_text' => 'Rome', 'is_correct' => false]);

        // Question 2: Multiple Choice (Computer Science)
        $q2 = Question::create([
            'question_text' => 'Which of the following are programming languages?',
            'type' => 'multiple',
            'subject_id' => $subjects->where('name', 'Computer Science')->first()->id ?? $subjects->random()->id,
        ]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'HTML', 'is_correct' => true]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'Photoshop', 'is_correct' => false]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'Python', 'is_correct' => true]);
        Option::create(['question_id' => $q2->id, 'option_text' => 'CSS', 'is_correct' => true]);

        // Question 3: Single Choice (Mathematics)
        $q3 = Question::create([
            'question_text' => 'What is 2 + 2?',
            'type' => 'single',
            'subject_id' => $subjects->where('name', 'Mathematics')->first()->id ?? $subjects->random()->id,
        ]);
        Option::create(['question_id' => $q3->id, 'option_text' => '3', 'is_correct' => false]);
        Option::create(['question_id' => $q3->id, 'option_text' => '4', 'is_correct' => true]);
        Option::create(['question_id' => $q3->id, 'option_text' => '5', 'is_correct' => false]);

        $this->command->info('MCQ questions seeded.');
    }
}
