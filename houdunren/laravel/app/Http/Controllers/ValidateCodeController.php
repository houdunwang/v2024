<?php

namespace App\Http\Controllers;

use App\Actions\GetUserByName;
use App\Actions\GetUserFieldByName;
use App\Actions\SendCode;
use App\Actions\SendValidateCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\UserNameValidate;
use Illuminate\Validation\ValidationException;

class ValidateCodeController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => ['required', new UserNameValidate]
        ]);

        $field = GetUserFieldByName::run($request->name);
        if (!in_array($field, ['email', 'mobile'])) {
            throw ValidationException::withMessages([
                'name' => '帐号不存在'
            ]);
        }
        SendCode::run(GetUserByName::run(request('name')));

        return $this->success();
    }
}
