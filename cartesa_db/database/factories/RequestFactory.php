<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->unique()->phoneNumber(),
            'city' => fake()->city(),
            'cap' => fake()->numberBetween(000,999),
            'description' => fake()->text(),
            'budget' => fake()->numberBetween(0,10000),
            'user_id'=> 1,
            'isAccepted' => fake()->boolean,
            'accepted_at' => now(),
        ];
    }
}

