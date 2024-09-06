<?php

//获取单条章节数据

use App\Models\Chapter;

test('ObtainTheDataOfASingleChapter', function () {
    $chapter = Chapter::factory()->create();
    $response = $this->get('/chapter/' . $chapter->id);
    $response->assertStatus(200);
    $response->assertJsonPath('data.title', $chapter->title);
});
