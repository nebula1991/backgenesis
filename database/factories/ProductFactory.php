<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 1, 100),
            'image' => fake()->imageUrl(public_path('public/images/products/1738451209_1-54558547.jpg'), 400, 300, null, false),
            'category_id' => fake()->numberBetween(1, 4),
            'subcategory_id' => fake()->numberBetween(1, 12),
        ];
    }
}
