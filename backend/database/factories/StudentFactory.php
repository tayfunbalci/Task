<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'first_name' => fake('tr_TR')->firstName,
            'last_name' => fake('tr_TR')->lastName,
            'student_number' => fake()->unique()->numberBetween($min = 1000, $max = 9000),
            'classroom' => fake()->randomElement([1, 2, 3, 4, 5]),
            'grade' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'code' => Str::random(8),
        ];
    }
}
