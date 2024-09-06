<?php


use App\Models\Chapter;
use App\Models\User;
use Illuminate\Support\Str;

// 章节标题不能为空
test('TheChapterTitleCannotBeEmpty', function () {
    $response = $this->actingAs(User::find(1))->postJson('/chapter', []);
    $response->assertStatus(422)->assertJsonValidationErrors('title');
});

//章节描述不能为空
test('TheChapterContentCannotBeEmpty', function () {
    $response = $this->actingAs(User::find(1))->postJson('/chapter', []);
    $response->assertStatus(422)->assertJsonValidationErrors('description');
});

//图片不能为空
test('TheChapterImageCannotBeEmpty', function () {
    $response = $this->actingAs(User::find(1))->postJson('/chapter', []);
    $response->assertStatus(422)->assertJsonValidationErrors('preview');
});

//必须是管理员才可以添加章节
test('OnlySuperAdminCanAddChapter', function () {
    $response = $this->actingAs(User::factory()->create())->postJson('/chapter', [
        'title' => Str::random(20),
        'description' => fake()->paragraphs(5, true),
        'preview' => fake()->imageUrl(300, 300),
    ]);
    $response->assertStatus(403);
});

//发表章节成功
test('AddChapterSuccessfully', function () {
    $response = $this->actingAs(User::find(1))->postJson('/chapter', [
        'title' => $title = Str::random(20),
        'description' => fake()->paragraphs(5, true),
        'preview' => fake()->imageUrl(300, 300),
    ]);
    $response->assertStatus(201)->assertJsonPath('data.title', $title);
});
