<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class TopicController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        return TopicResource::collection(Topic::paginate(10));
    }

    public function store(StoreTopicRequest $request, Topic $topic)
    {
        Gate::authorize('create', Topic::class);
        $topic->fill($request->input())->save();
        return $topic;
    }

    public function show(Topic $topic)
    {
        return new TopicResource($topic);
    }

    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        Gate::authorize('update', $topic);
        $topic->fill($request->input())->save();
        return new TopicResource($topic);
    }

    public function destroy(Topic $topic)
    {
        Gate::authorize('delete', $topic);
        $topic->delete();
        return response()->noContent();
    }
}
