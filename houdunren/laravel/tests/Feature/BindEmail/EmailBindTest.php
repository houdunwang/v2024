<?php

use App\Models\User;

//绑定邮箱
test('bindAnEmailAddress', function () {
    $user = User::factory()->create();
    $email = fake()->unique()->email();
    $this->postJson('/api/code/send/no-exist', [
        'name' => $email
    ]);
    $code = Cache::get(config('hd.code_prefix') . $email);
    $response = $this->actingAs($user)->postJson('/api/email/bind', [
        'code' => $code,
        'email' => $email,
        'password' => 'admin888',
    ]);
    $response->assertStatus(200);
    expect($user->email)->toBe($email);
});
