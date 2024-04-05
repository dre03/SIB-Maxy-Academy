<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
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
        'address' => fake()->address(),
        'gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
        'no_telp' => fake()->phoneNumber(),
        'created_at' => $createdAt,
        'updated_at' => $updatedAt,
        ];
    }
}
