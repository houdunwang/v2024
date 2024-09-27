<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayLogRequest;
use App\Http\Requests\UpdatePlayLogRequest;
use App\Http\Resources\PlayLogResource;
use App\Models\PlayLog;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PlayLogController extends Controller
{
    public function index()
    {
        $logs = PlayLog::when(request('user_id'), function (Builder $builder, $userId) {
            $builder->where('user_id', $userId);
        })->paginate(request('row', 10));
        return PlayLogResource::collection($logs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlayLog $playLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlayLog $playLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayLogRequest $request, PlayLog $playLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlayLog $playLog)
    {
        //
    }
}
