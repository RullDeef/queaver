<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LabTask>
 */
class LabTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'index' => $this->faker->numberBetween(1, 10),
            'title' => "Lab task #X",
            'description' => $this->faker->text(200),
            'deadline' => $this->faker->dateTimeBetween('+2 days', '+2 days'),
        ];
    }
}
