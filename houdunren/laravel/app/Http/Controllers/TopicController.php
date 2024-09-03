<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TopicController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }

    public function index()
    {
        return TopicResource::collection(Topic::with('user')->paginate(request('row', 10)));
    }

    public function store(StoreTopicRequest $request, Topic $topic)
    {
        Gate::authorize('create', Topic::class);
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();
        return new TopicResource($topic);
    }

    public function show(Topic $topic) {}

    public function update(UpdateTopicRequest $request, Topic $topic) {}

    public function destroy(Topic $topic) {}
}
