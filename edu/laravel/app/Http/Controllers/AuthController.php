<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $value = $request->input('account');
        $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : (preg_match('/^\d{11}$/', $value) ? 'mobile' : 'name');
        $request->validate([
            'account' => ['required', 'exists:users,' . $field],
            'password' => ['required', 'between:3,20']
        ], [], ['account' => '帐号', 'password' => '密码']);
        $user = User::where($field, $value)->first();
        if (!Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages(['password' => '密码输入错误']);
        }

        Auth::login($user);
        return ['token' => $user->createToken('auth_token')->plainTextToken];
    }

    public function register(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'unique:users,name'],
            'password' => ['required', 'between:3,20', 'confirmed  '],
        ]);
        $user->name = request('name');
        $user->password = Hash::make(request('password'));
        $user->save();
        return new UserResource($user);
    }

    public function logout()
    {
        Auth::user()->logout();
        return $this->respondOk('退出成功');
    }
}
