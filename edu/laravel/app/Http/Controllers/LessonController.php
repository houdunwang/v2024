<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class LessonController extends Controller  implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }

    public function index()
    {
        sleep(2);
        return LessonResource::collection(Lesson::paginate(10));
    }

    public function store(StoreLessonRequest $request, Lesson $lesson)
    {

        Gate::authorize('create', Lesson::class);
        $lesson->fill($request->input())->save();
        return $lesson;
    }

    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        Gate::authorize('update', $lesson);
        $lesson->fill($request->input())->save();
        return new LessonResource($lesson);
    }

    public function destroy(Lesson $lesson)
    {
        Gate::authorize('delete', $lesson);
        $lesson->delete();
        return response()->noContent();
    }
}
