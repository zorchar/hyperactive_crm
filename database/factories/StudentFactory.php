<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '05' . fake()->numberBetween($min = 2, $max = 8) . fake()->numberBetween($min = 1000000, $max = 9999999),
            'national_id' => fake()->numberBetween($min = 100000000, $max = 999999999),
            'address' => fake()->address(),
            'curriculum' => 'frontend',
            'starting_date' => now()
        ];
    }
}