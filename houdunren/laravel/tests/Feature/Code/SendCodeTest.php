<?php


use App\Models\User;
use App\Notifications\SendValidateCode;

//帐号不存在时不能发送邮件
test('YouCantSendEmailsIfYourAccountDoesntExist', function () {
    $response = $this->postJson('code/send', [
        'name' => fake()->email() . 'sldksdklsdk'
    ]);

    $response->assertStatus(422)->assertJsonValidationErrors('name');
});

//发送邮件验证码
test('SendAnEmailVerificationCode', function () {
    Notification::fake();
    $user = User::factory()->create();
    $this->postJson('code/send', [
        'name' => $user->email
    ]);
    Notification::assertSentTo(
        [$user],
        SendValidateCode::class
    );
});
