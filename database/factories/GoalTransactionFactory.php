<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GoalTransaction>
 */
class GoalTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 1, 2000),
            'description' => $this->faker->text(),
            'type'=> $this->faker->numberBetween(1, 2),
            'date' => fake()->dateTimeBetween('-6 month', now()),
        ];
    }
}
