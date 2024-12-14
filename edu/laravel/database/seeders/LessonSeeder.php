<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::factory(10)->hasChapters(9)->create();
        // Lesson::factory(10)->hasChapters(9)->create([
        //     "type" => "system",
        //     'preview' => url('/assets/system/' . fake()->numberBetween(1, 12) . '.jpeg')
        // ]);
        Lesson::factory(10)->hasChapters(9)->make()->each(function ($lesson) {
            $lesson->preview = url('/assets/system/' . fake()->numberBetween(1, 12) . '.jpeg');
            $lesson->type = 'system';
            $lesson->save();
        });
    }
}
