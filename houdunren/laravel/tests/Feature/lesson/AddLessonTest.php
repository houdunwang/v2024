<?php


use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Str;

// 课程标题不能为空
test('TheLessonTitleCannotBeEmpty', function () {
    $response = $this->actingAs(User::find(1))->postJson('/lesson', []);
    $response->assertStatus(422)->assertJsonValidationErrors('title');
});

//课程描述不能为空
test('TheLessonContentCannotBeEmpty', function () {
    $response = $this->actingAs(User::find(1))->postJson('/lesson', []);
    $response->assertStatus(422)->assertJsonValidationErrors('description');
});

//图片不能为空
test('TheLessonImageCannotBeEmpty', function () {
    $response = $this->actingAs(User::find(1))->postJson('/lesson', []);
    $response->assertStatus(422)->assertJsonValidationErrors('preview');
});

//必须是管理员才可以添加课程
test('OnlySuperAdminCanAddLesson', function () {
    $response = $this->actingAs(User::factory()->create())->postJson('/lesson', [
        'title' => Str::random(20),
        'description' => fake()->sentence(30, true),
        'preview' => fake()->imageUrl(300, 300),
    ]);
    $response->assertStatus(403);
});

//发表课程成功
test('AddLessonSuccessfully', function () {
    $response = $this->actingAs(User::find(1))->postJson('/lesson', [
        'title' => $title = Str::random(20),
        'description' => fake()->paragraphs(5, true),
        'preview' => fake()->imageUrl(300, 300),
    ]);
    $response->assertStatus(201)->assertJsonPath('data.title', $title);
});
