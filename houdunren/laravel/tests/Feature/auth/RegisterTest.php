<?php

use Illuminate\Support\Str;

//用户名不能小于5位
test('TheUsernameCannotBeLessThan5Digits', function () {
    $response = $this->postJson('/register', [
        'name' => Str::random(2),
        'password' => 'admin888',
        'password_confirmation' => 'admin888'
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['name']);
});

//用户名不能超过20位
test('TheUsernameCannotBeMoreThan20Digits', function () {
    $response = $this->postJson('/register', [
        'name' => Str::random(21),
        'password' => 'admin888',
        'password_confirmation' => 'admin888'
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['name']);
});

//用户名必须以字母开始
test('TheUsernameMustStartWithALetter', function () {
    $response = $this->postJson('/register', [
        'name' => '12345',
        'password' => 'admin888',
        'password_confirmation' => 'admin888'
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['name']);
});

//两次密码要一致
test('ThePasswordsMustBeTheSame', function () {
    $response = $this->postJson('/register', [
        'name' => 'admin123',
        'password' => 'admin888',
        'password_confirmation' => 'admin8881'

    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['password']);
});

//用户名不能存在
test('TheUsernameCannotExist', function () {
    $response = $this->postJson('/register', [
        'name' => 'admin',
        'password' => 'admin888',
        'password_confirmation' => 'admin888'
    ]);
    $response->assertStatus(422)->assertJsonValidationErrors(['name']);
});
