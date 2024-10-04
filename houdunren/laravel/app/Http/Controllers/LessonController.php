<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class LessonController extends Controller implements HasMiddleware
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
        abort(401);
        // sleep(1);
        return LessonResource::collection(Lesson::with('chapter')->paginate(request('row', 12)));
    }

    public function store(StoreLessonRequest $request, Lesson $lesson)
    {
        Gate::authorize('create', $lesson);

        $lesson->fill($request->input())->save();
        return new LessonResource($lesson);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson->load('videos:id,lesson_id,title,created_at,updated_at'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        Gate::authorize('update', $lesson);

        $lesson->fill($request->input())->save();
        return new LessonResource($lesson);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        Gate::authorize('delete', $lesson);
        $lesson->delete();
        return response(null, 204);
    }
}
