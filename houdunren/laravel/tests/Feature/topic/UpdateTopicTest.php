<?php

//更新贴子

use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Str;

//正确贴子更新
test('UpdateTopicData', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs($topic->user)->putJson("/topic/{$topic->id}", [
        'title' => Str::random(10),
        'content' => fake()->paragraphs(3, true)
    ]);
    $response->assertStatus(200);
});

//贴子标题不能过少
test('UpdateTopicTitleTooShort', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(2))->putJson("/topic/{$topic->id}", [
        'title' => Str::random(2),
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['title']);
});

//贴子标题长度过长时
test('UpdateTopicTitleTooLong', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(2))->putJson("/topic/{$topic->id}", [
        'title' => Str::random(201),
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['title']);
});

//贴子内容不能过少
test('UpdateTopicContentTooShort', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(2))->putJson("/topic/{$topic->id}", [
        'title' =>  Str::random(20),
        'content' => Str::random(2),
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['content']);
});

//贴子内容长度过长时
test('UpdateTopicContentTooLong', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(2))->putJson("/topic/{$topic->id}", [
        'title' =>  Str::random(20),
        'content' => Str::random(3001),
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['content']);
});

//不能修改别人的贴子
test('UpdateTopicForbidden', function () {
    $topic = Topic::factory()->forUser()->create();
    $user = User::factory()->create();
    $response = $this->actingAs($user)->putJson("/topic/{$topic->id}", [
        'title' => Str::random(10),
        'content' => fake()->paragraphs(3, true)
    ]);
    $response->assertStatus(403);
});

//超级管理员允许修改任何人的贴子
test('UpdateTopicBySuperAdmin', function () {
    $topic = Topic::factory()->forUser()->create();
    $user = User::factory()->create();
    $response = $this->actingAs($user)->putJson("/topic/{$topic->id}", [
        'title' => Str::random(10),
        'content' => fake()->paragraphs(3, true)
    ]);
    $response->assertStatus(403);
});
