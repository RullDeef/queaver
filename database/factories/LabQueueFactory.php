<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LabQueue>
 */
class LabQueueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->text(10),
            'semester' => fake()->numberBetween(1, 8),
            'labs_count' => fake()->numberBetween(10, 40),
            'priority_policy' => fake()->numberBetween(0, 3),
            'group_index_indifference' => fake()->boolean(),
            'creator_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
