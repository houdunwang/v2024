<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    public function run(): void
    {
        Chapter::factory()->count(12)
            ->has(Lesson::factory()->count(2)
                ->hasVideos(10))->create();
    }
}
