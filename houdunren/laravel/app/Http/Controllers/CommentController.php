<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }

    public function index(Request $request)
    {
        //模型 video topic  模型id:   video 1
        $class = '\App\Models\\' . request('model_name');
        $instance = $class::find(request('model_id'));
        return CommentResource::collection($instance->comments()->whereNull('comment_id')->get());
    }

    public function store(StoreCommentRequest $request)
    {
        Gate::authorize('create', Comment::class);
    }

    public function show(Comment $comment) {}

    public function update(UpdateCommentRequest $request, Comment $comment) {}

    public function destroy(Comment $comment) {}
}
