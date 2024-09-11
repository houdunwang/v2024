<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->title(),
            'ad' => fake()->sentence(3),
            'price' => fake()->numberBetween(100, 599),
            "original_price" => fake()->numberBetween(600, 999),
            "months" => fake()->numberBetween(3, 60),
            'state' => fake()->numberBetween(0, 1),
            "icon" => fake()->imageUrl("100x100")
        ];
    }
}
