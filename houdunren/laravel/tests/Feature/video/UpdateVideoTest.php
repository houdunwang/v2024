<?php

use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Video;

//更新视频
test('UpdateVideo', function () {
    $chapter = Chapter::factory()->forLesson()->create();
    $video = Video::factory()->for($chapter)->create([
        'lesson_id' => $chapter->lesson_id
    ]);


    $videos = [
        $video->makeVisible('path')->toArray(),
        ['title' => fake()->sentence(), 'path' => fake()->url()],
        ['title' => fake()->sentence(), 'path' => fake()->url()],
    ];

    $response = $this->actingAs(User::find(1))->putJson('/video/' . $video->chapter_id, [
        'chapter_id' => $video->chapter_id,
        'videos' => $videos,
    ]);
    $response->assertStatus(200)
        ->assertJsonPath('data.0.title', $videos[0]['title']);
});
