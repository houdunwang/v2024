<?php

namespace App\Actions;

namespace App\Actions;

use App\Models\PlayLog;
use App\Models\User;
use App\Models\Video;
use Lorisleiva\Actions\Concerns\AsAction;

class RecordPlayLogAction
{
    use AsAction;

    public function handle(User $user, Video $video)
    {
        $user->playLog()->sync([$video->id => ['lesson_id' => $video->lesson_id]]);
    }
}
