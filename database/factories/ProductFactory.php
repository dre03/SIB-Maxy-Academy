<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        $createdAt = $this->faker->dateTimeBetween('-2 years', Carbon::now());
        $updatedAt = $this->faker->dateTimeBetween($createdAt, Carbon::now());
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(1000, 10000),
            'stock' => fake()->numberBetween(1, 100),
            'category' => fake()->word(),
            'brand' => fake()->company(),
            'description' => fake()->sentence(),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ];
    }
}
