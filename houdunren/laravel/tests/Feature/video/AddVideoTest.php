<?php

use App\Models\Lesson;
use App\Models\User;

//添加视频
test('addVideoData', function () {
    $videos = [
        ['title' =>  fake()->sentence(), 'path' => fake()->url()],
        ['title' => fake()->sentence(), 'path' => fake()->url()],
    ];
    $response = $this->actingAs(User::find(1))->postJson('/video', [
        'lesson_id' => Lesson::factory()->forChapter()->create()->id,
        'videos' => $videos,
    ]);
    $response->assertStatus(200)
        ->assertJsonPath('data.0.title', $videos[0]['title']);
});
