<?php

use Illuminate\Support\Str;
use App\Models\User;

//普通用户不能添加
test('RegularUsersCannotBeAdded', function () {
    $response = $this->actingAs(User::factory()->create())->postJson('/lesson', [
        'title' => fake()->words(3, true),
        'description' => fake()->paragraphs(3, true),
        'preview' => fake()->imageUrl()
    ]);
    $response->assertStatus(403);
});

//课程添加数据验证
test('AddDataValidationToTheCourse', function () {
    $response = $this->actingAs(User::find(1))->postJson('/lesson', [
        'title' => Str::random(3),
        'description' => Str::random(3),
        'preview' => fake()->title()
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['title', 'description', 'preview']);
});
