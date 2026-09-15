<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'category_id' => fake()->numberBetween(1, 5),
        'name' => fake()->unique()->words(3, true),
        'decription' => fake()->paragraph(),
        'price' => fake()->randomFloat(2, 100, 5000),
        'stock' => fake()->numberBetween(10, 100),
        ];
    }
}
