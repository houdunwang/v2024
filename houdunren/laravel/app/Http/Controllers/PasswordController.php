<?php

namespace App\Http\Controllers;

use App\Actions\GetUserByName;
use App\Actions\UserLoginAction;
use App\Rules\CheckCodeRule;
use App\Rules\UserNameValidate;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    public function find(Request $request)
    {
        $request->validate([
            'name' => ['required', new UserNameValidate],
            'password' => ['required', 'confirmed'],
            'code' => ['required', new CheckCodeRule]
        ], [], ['code' => '验证码']);
        $user = GetUserByName::run($request->name);
        if (!in_array($request->name, [$user->email, $user->mobile])) {
            throw ValidationException::withMessages(['name' => '请输入邮箱或手机号']);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return UserLoginAction::run($user);
    }
}
