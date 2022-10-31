<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween($min = 1, $max = 5),
            'description' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'creator' => 1,
            'created_at' => now()
        ];
    }
}
