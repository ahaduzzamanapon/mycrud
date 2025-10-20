<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SeoSetting;
use Faker\Generator as Faker;

$factory->define(SeoSetting::class, function (Faker $faker) {

    return [
        'page' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'title' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'meta_description' => $this->faker->boolean,
            'meta_keywords' => $this->faker->boolean,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
