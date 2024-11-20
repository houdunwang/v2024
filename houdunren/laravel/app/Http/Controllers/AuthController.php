<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private function getUser(string $name)
    {
        $user = User::orWhere('name', $name);
        foreach (['email', 'mobile'] as $field) {
            $user->orWhere($field, $name);
        }
        return $user->first();
    }

    public function login(Request $request)
    {
        $user = $this->getUser($request->input('name'));
        $request->validate(
            [
                'name' => ['required', function ($attributes, $value, $fail) use ($user) {
                    if (!$user) {
                        $fail('用户不存在，请检查帐号');
                    }
                }],
                'password' => ['required', function ($attributes, $value, $fail) use ($request, $user) {
                    if (!$user || !Hash::check($request->input('password'), $user->password)) {
                        $fail('密码输入错误');
                    }
                }],
                'captcha' => 'required|captcha_api:' . request('captcha_key') . ',math'
            ],
            ['captcha.captcha_api' => '验证码输入错误']
        );
        Auth::login($user, true);
        $token = $request->user()->createToken('app');
        return ['token' => $token->plainTextToken, 'user' => $user];
        // return ['code' => 0, 'msg' => '登录成功'];
    }

    public function register(RegisterRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return ['user' => $user];
    }

    public function logout()
    {
        Auth::logout();
        return ['code' => 0, 'msg' => '退出成功'];
    }
}
