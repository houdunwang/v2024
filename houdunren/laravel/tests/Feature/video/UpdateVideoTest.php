<?php

use App\Models\Lesson;
use App\Models\User;
use App\Models\Video;

//更新视频
test('UpdateVideo', function () {
    $video = Video::factory()->for(Lesson::factory()->forChapter())->create();
    $videos = [
        $video->toArray(),
        ['title' => fake()->sentence(), 'path' => fake()->url()],
        ['title' => fake()->sentence(), 'path' => fake()->url()],
    ];
    $response = $this->actingAs(User::find(1))->putJson('/video', [
        'lesson_id' => $video->lesson->id,
        'videos' => $videos,
    ]);
    $response->assertStatus(200)
        ->assertJsonPath('data.0.title', $videos[0]['title']);
});
