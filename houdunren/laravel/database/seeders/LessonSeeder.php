<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        Lesson::factory()->count(12)
            ->has(
                Chapter::factory(2)->hasVideos(10, function ($attributes, $chapter) {
                    return [
                        'lesson_id' => $chapter->lesson_id
                    ];
                })
            )->create();
    }
}
