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
            'title' => ucfirst(fake()->word()),
            'price' => prettyPrice(fake()->numberBetween(1000, 10000)),
            'discount' => fake()->randomElement(range(0, 50, 5)),
            'quantity' => fake()->numberBetween(20, 100),
            'times_bought' => 0,
        ];
    }
}
