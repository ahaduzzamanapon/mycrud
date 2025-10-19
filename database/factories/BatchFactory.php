<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Batch>
 */
use App\Models\Course;

class BatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course_id' => Course::factory(),
            'name' => $this->faker->words(2, true) . ' Batch',
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
