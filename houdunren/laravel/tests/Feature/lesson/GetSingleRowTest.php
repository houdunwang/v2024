<?php

//获取单条课程数据
use App\Models\Chapter;
use App\Models\Lesson;

test('ObtainTheDataOfASingleChapter', function () {
    $lesson = Lesson::factory()->create();
    $response = $this->get('/lesson/' . $lesson->id);
    $response->assertStatus(200);
    $response->assertJsonPath('data.title', $lesson->title);
});
