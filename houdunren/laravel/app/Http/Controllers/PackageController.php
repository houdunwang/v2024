<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class PackageController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }

    public function index()
    {
        $packages = Package::when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })->get();
        return PackageResource::collection($packages);
    }

    public function store(StorePackageRequest $request, Package $package)
    {
        Gate::authorize('create', $package);
        $package->fill($request->validated())->save();
        return new PackageResource($package->refresh());
    }

    public function show(Package $package)
    {
        return new PackageResource($package);
    }

    public function update(UpdatePackageRequest $request, Package $package)
    {
        Gate::authorize('update', $package);
        $package->fill($request->validated())->save();
        return new PackageResource($package);
    }

    public function destroy(Package $package)
    {
        Gate::authorize('delete', $package);
        $package->delete();
        return response()->noContent();
    }
}
