<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __invoke()
    {
        $activies = Activity::with('subject', 'causer')->when(request('user_id'), function (Builder $builder, int $user_id) {
            $builder->where('causer_id', $user_id);
        })->paginate(request('row', 10));
        return ActivityResource::collection($activies);
    }
}
