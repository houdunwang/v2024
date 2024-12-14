<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'preview' => url('/assets/lesson/' . $this->faker->numberBetween(1, 12) . '.jpeg'),
            'lesson_id' => Lesson::inRandomOrder()->value('id'),
            "description" => $this->faker->sentence(10),
        ];
    }
}
