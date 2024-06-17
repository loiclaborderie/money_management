<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount'=> fake()->randomFloat(2, 2, 2000),
            'description'=> fake()->text(),
            'type'=> fake()->numberBetween(1, 2),
            'date' => fake()->dateTimeBetween('-6 month', now()),
        ];
    }
}
