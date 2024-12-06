<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'preview' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(100, 500),
            'download_address' => $this->faker->url()
        ];
    }
}
