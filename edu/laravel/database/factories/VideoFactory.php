<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $chapter = Chapter::inRandomOrder()->first();
        return [
            'title' => fake()->sentence(),
            'path' => fake()->url(),
            'lesson_id' => $chapter->lesson->id,
            'chapter_id' => $chapter->id
        ];
    }
}
