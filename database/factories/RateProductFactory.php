<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RateProduct>
 */
class RateProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->numberBetween(1, 10),
            'name' => fake()->word(),
            'price_rate' => fake()->randomFloat(2, 1, 100),
            'start_date' => fake()->dateTimeBetween('-1 years', 'now'),
            'end_date' => fake()->dateTimeBetween('now', '+1 years'),
        ];
    }
}
