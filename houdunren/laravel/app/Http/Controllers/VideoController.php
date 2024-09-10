<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\Lesson;
use App\Models\Video;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class VideoController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index'])
        ];
    }

    public function index()
    {
        return VideoResource::collection(Video::paginate(request('row', 10)));
    }

    public function store(StoreVideoRequest $request)
    {
        $lesson = Lesson::findOrFail($request->lesson_id);

        $videos = collect($request->videos)->map(function ($data) use ($lesson) {
            return $lesson->videos()->create($data);
        });
        return VideoResource::collection($videos);
    }

    public function show(Video $video)
    {
        Gate::authorize('view', $video);
        return new VideoResource($video);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        Gate::authorize('update', $video);
        $lesson = Lesson::findOrFail($request->lesson_id);
        $videos = collect($request->videos)->map(function ($data) use ($lesson) {
            return $lesson->videos()->updateOrCreate([
                'id' => $data->id ?? null
            ], $data);
        });
        return VideoResource::collection($videos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        Gate::authorize('delete', $video);
        $video->delete();
        return response(null, 204);
    }
}
