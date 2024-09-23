<?php

use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\User;

//添加视频
test('addVideoData', function () {
    $lesson  = Chapter::factory()->forLesson()->create();
    $videos = [
        ['title' =>  fake()->sentence(), 'path' => fake()->url()],
        ['title' => fake()->sentence(), 'path' => fake()->url()],
    ];
    $response = $this->actingAs(User::find(1))->postJson('/video/' . $lesson->id, [
        'videos' => $videos,
    ]);
    $response->assertStatus(200)
        ->assertJsonPath('data.0.title', $videos[0]['title']);
});
