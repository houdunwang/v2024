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
        Chapter::factory()->count(24)
            ->has(Lesson::factory()->count(2)
                ->hasVideos(10, function ($atrribute, $lesson) {
                    return ['chapter_id' => $lesson->chapter_id];
                }))->create();


        Chapter::limit(12)->get()->each(function ($chapter, $key) {
            $chapter['preview'] = '/images/system/' . ($key + 1) . '.jpeg';
            $chapter['type'] = 'system';
            $chapter->save();
        });
        Chapter::offset(12)->limit(12)->get()->each(function ($chapter, $key) {
            $chapter['preview'] = '/images/project/' . ($key + 1) . '.jpeg';
            $chapter['type'] = 'project';
            $chapter->save();
        });
    }
}
