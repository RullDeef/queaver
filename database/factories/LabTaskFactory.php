<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\LabQueue;
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
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(200),
            'deadline' => $this->faker->optional()->dateTimeBetween('+2 days', '+10 days'),
            'lab_queue_id' => LabQueue::inRandomOrder()->first()->id,
            'creator_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
