<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\Chapter;
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
        return VideoResource::collection(Video::with('chapter')->paginate(request('row', 10)));
    }

    public function store(StoreVideoRequest $request, Chapter $chapter)
    {
        Gate::authorize('create', Video::class);
        $videos = collect($request->videos)
            //过滤掉没有标题和视频 url 那个数据
            ->filter(fn($video) => !empty($video['title']) && !empty($video['path']))
            ->map(function ($data) use ($chapter) {
                return $chapter->videos()->create($data + ['lesson_id' => $chapter->lesson_id]);
            });
        return VideoResource::collection($videos);
    }

    public function show(Video $video)
    {
        Gate::authorize('view', $video);
        return new VideoResource($video->makeVisible('path'));
    }

    public function update(UpdateVideoRequest $request, Chapter $chapter)
    {
        Gate::authorize('update', Video::class);
        $videos = collect($request->videos)
            ->filter(fn($video) => !empty($video['title']) && !empty($video['path']))
            ->map(function ($data) use ($chapter) {
                return $chapter->videos()->updateOrCreate([
                    'id' => $data->id ?? null,
                    'lesson_id' => $chapter->lesson_id
                ], $data);
            });
        return VideoResource::collection($videos);
    }

    public function destroy(Video $video)
    {
        Gate::authorize('delete', $video);
        $video->delete();
        return response(null, 204);
    }
}
