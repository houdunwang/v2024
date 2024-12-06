<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        $user = User::find(1);
        $user->name = 'admin';
        $user->save();

        $this->call([
            LessonSeeder::class,
            ChapterSeeder::class,
            VideoSeeder::class,
            TopicSeeder::class,
            SignSeeder::class
        ]);
    }
}
