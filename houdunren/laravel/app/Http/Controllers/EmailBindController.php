<?php

namespace App\Http\Controllers;

use App\Rules\CheckCodeRule;
use App\Rules\CheckPasswordRule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EmailBindController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: [])
        ];
    }

    public function bind(Request $request)
    {
        $request->validate([
            'code' => ['required', new CheckCodeRule('email')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', new CheckPasswordRule]
        ]);
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();
        return response()->json(['message' => '邮箱绑定成功']);
    }
}
