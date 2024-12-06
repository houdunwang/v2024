<?php

namespace App\Http\Controllers;

use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VideoController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index']),
        ];
    }

    public function index()
    {
        return VideoResource::collection(Video::paginate(10));
    }

    public function show(Video $video)
    {
        return new VideoResource($video);
    }
}
