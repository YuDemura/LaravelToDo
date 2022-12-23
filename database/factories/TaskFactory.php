<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'status' => 1,
            'description' => fake()->word(),
        ];
    }

    public function ready()
    {
        return $this->state(fn ()  => [
            'status' => 1
        ]);
    }

    public function doing()
    {
        return $this->state(fn ()  => [
            'status' => 2
        ]);
    }
}
