<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignRequest;
use App\Http\Requests\UpdateSignRequest;
use App\Http\Resources\SignResource;
use App\Models\Sign;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SignController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }

    public function index(Request $request)
    {
        $signs = Sign::when($request->uid, function ($query, $uid) {
            $query->where('user_id', $uid);
        })->get();
        return SignResource::collection($signs);
    }

    public function store(StoreSignRequest $request, Sign $sign)
    {
        Gate::authorize('create', Sign::class);
        $sign = Auth::user()->signs()->create($request->validated());
        return new SignResource($sign);
    }

    public function show(Sign $sign) {}

    public function update(UpdateSignRequest $request, Sign $sign)
    {
        Gate::authorize('update', $sign);
        $sign->fill($request->validated())->save();
        return new SignResource($sign);
    }

    public function destroy(Sign $sign)
    {
        Gate::authorize('update', $sign);
        $sign->delete();
        return response(null, 204);
    }
}
