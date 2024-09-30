<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use Illuminate\Contracts\Database\Eloquent\Builder;
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

    public function index()
    {
        // sleep(1);
        // abort(404);
        $chapters = Chapter::when(request('type'), function (Builder $builder, string $type) {
            $builder->where('type', $type);
        })->paginate(request('row', 12));
        return ChapterResource::collection($chapters);
    }

    public function store(StoreChapterRequest $request, Chapter $chapter)
    {
        Gate::authorize('create', Chapter::class);
        $chapter->fill($request->input())->save();

        return new ChapterResource($chapter);
    }

    public function show(Chapter $chapter)
    {
        return new ChapterResource($chapter->load('lessons'));
    }

    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        Gate::authorize('update', Chapter::class);
        $chapter->fill($request->input())->save();
        return new ChapterResource($chapter);
    }

    public function destroy(Chapter $chapter)
    {
        Gate::authorize('delete', Chapter::class);
        $chapter->delete();
        return response()->noContent();
    }
}
