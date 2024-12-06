<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignRequest;
use App\Http\Resources\SignResource;
use App\Models\Sign;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class SignController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }
    public function index()
    {
        return SignResource::collection(Sign::paginate(10));
    }

    public function store(StoreSignRequest $request, SignResource $sign)
    {
        Gate::authorize('create', SignResource::class);
        $sign->fill($request->input())->save();
        return $sign;
    }

    public function destroy(SignResource $sign)
    {
        Gate::authorize('delete', $sign);
        $sign->delete();
        return response()->noContent();
    }
}
