<?php

namespace App\Http\Controllers;

use App\Rules\CheckCodeRule;
use App\Rules\CheckUserPasswordRule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'email' => ['required', 'email'],
            'password' => ['required', new CheckUserPasswordRule]
        ]);
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();
        return $this->respondOk('修改成功');
    }
}
