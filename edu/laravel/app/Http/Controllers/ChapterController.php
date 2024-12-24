<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ChapterController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        return ChapterResource::collection(Chapter::paginate(10));
    }

    public function store(StoreChapterRequest $request, Chapter $lesson)
    {
        Gate::authorize('create', Chapter::class);
        $lesson->fill($request->input())->save();
        return $lesson;
    }

    public function show(Chapter $chapter)
    {
        return new ChapterResource($chapter->load(['lesson', 'videos']));
    }

    public function update(UpdateChapterRequest $request, Chapter $lesson)
    {
        Gate::authorize('update', $lesson);
        $lesson->fill($request->input())->save();
        return new ChapterResource($lesson);
    }

    public function destroy(Chapter $lesson)
    {
        Gate::authorize('delete', $lesson);
        $lesson->delete();
        return response()->noContent();
    }
}
