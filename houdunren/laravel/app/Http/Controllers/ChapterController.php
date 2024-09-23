<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Resources\ChapterResource;
use App\Http\Resources\LessonResource;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ChapterController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ChapterResource::collection(Chapter::with('chapter')->get());
    }

    public function store(StoreChapterRequest $request, Chapter $chapter)
    {
        Gate::authorize('create', $chapter);

        $chapter->fill($request->input())->save();
        return new ChapterResource($chapter);
    }

    public function show(Chapter $chapter)
    {
        return new ChapterResource($chapter);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        Gate::authorize('update', $chapter);

        $chapter->fill($request->input())->save();
        return new ChapterResource($chapter);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        Gate::authorize('delete', $chapter);
        $chapter->delete();
        return response(null, 204);
    }
}
