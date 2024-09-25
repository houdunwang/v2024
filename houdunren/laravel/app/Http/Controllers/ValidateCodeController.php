<?php

namespace App\Http\Controllers;

use App\Actions\SendCodeAction;
use Illuminate\Http\Request;
use App\Rules\UserNameValidate;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ValidateCodeController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['user'])
        ];
    }

    //数据表中存的邮箱或手机号发送验证码
    public function user(Request $request)
    {
        $request->validate([
            'name' => ['required', new UserNameValidate(['email', 'mobile'])]
        ]);

        SendCodeAction::run(request('name'));

        return $this->success();
    }

    //给任意邮箱或手机号发送验证码，要求用户必须登录
    public function send(Request $request)
    {
        $request->validate([
            'name' => ['required', 'email']
        ]);

        SendCodeAction::run(request('name'));
        return $this->success();
    }
}
