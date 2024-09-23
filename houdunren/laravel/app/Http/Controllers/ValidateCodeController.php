<?php

namespace App\Http\Controllers;

use App\Actions\SendCodeAction;
use Illuminate\Http\Request;
use App\Rules\UserNameValidate;

/**
 * 发送验证码
 */
class ValidateCodeController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => ['required', new UserNameValidate(['email', 'mobile'])]
        ]);

        SendCodeAction::run(request('name'));

        return $this->respondOk('发送成功');
    }

    public function noExist(Request $request)
    {
        $request->validate([
            'name' => ['required', 'email']
        ]);

        SendCodeAction::run(request('name'));

        return $this->respondOk('发送成功');
    }
}
