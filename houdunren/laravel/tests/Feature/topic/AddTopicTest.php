<?php

use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Str;

//正确添加贴子
test('UpdateTopicData', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs($topic->user)->postJson("/topic", [
        'title' => Str::random(10),
        'content' => fake()->paragraphs(3, true)
    ]);
    $response->assertStatus(201);
});

//标题不能为空
test('TheTitleCannotBeEmpty', function () {
    $response = $this->actingAs(User::first())->postJson('/topic', [
        'title' => '',
        'content' => ''
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['title', 'content']);
});

//贴子标题不能过少
test('UpdateTopicTitleTooShort', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(2))->postJson("/topic", [
        'title' => Str::random(2),
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['title']);
});

//贴子标题长度过长时
test('UpdateTopicTitleTooLong', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(2))->postJson("/topic", [
        'title' => Str::random(201),
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['title']);
});

//贴子内容不能过少
test('UpdateTopicContentTooShort', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(2))->postJson("/topic", [
        'title' =>  Str::random(20),
        'content' => Str::random(2),
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['content']);
});

//贴子内容长度过长时
test('UpdateTopicContentTooLong', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(2))->postJson("/topic", [
        'title' =>  Str::random(20),
        'content' => Str::random(3001),
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['content']);
});
