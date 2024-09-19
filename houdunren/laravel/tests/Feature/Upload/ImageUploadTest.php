<?php

//必须登录后才可以上传
use App\Models\User;
use Illuminate\Http\UploadedFile;

function user()
{
    return User::factory()->create();
}
test('YouMustBeLoggedInToUpload', function () {
    $response = $this->postJson('/upload/image');
    $response->assertStatus(401);
});

//文件必须是图片
test('YouMustUploadAnImage', function () {
    $response = $this->actingAs(user())->postJson('/upload/image', [
        'image' => UploadedFile::fake()->create('test.txt')
    ]);
    $response->assertStatus(422);
});

//测试图片大小
test('ImageSizeMustBeLessThan', function () {
    $response = $this->actingAs(user())->postJson('/upload/image', [
        'image' => UploadedFile::fake()->image('test.jpg', 1000, 1000)->size(10 * 1024)
    ]);

    $response->assertStatus(422);
});

//不能超过指定宽高
test('TheSpecifiedWidthAndHeightCannotBeExceeded', function () {
    $response = $this->actingAs(user())->postJson('/upload/image', [
        'image' => UploadedFile::fake()->image('test.jpg', 3000, 1000)->size(1024)
    ]);
    $response->dump();
    // $response->assertStatus(422);
});
