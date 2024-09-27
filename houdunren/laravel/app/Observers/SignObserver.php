<?php

namespace App\Observers;

use App\Models\Sign;
use App\Models\SignCount;

class SignObserver
{
    public function updateCount(Sign $sign)
    {
        SignCount::updateOrCreate([
            'user_id' => $sign->user_id
        ], [
            'month' => $sign->user->signs()->whereMonth('created_at', now()->month)->count(),
            'year' => $sign->user->signs()->whereYear('created_at', now()->year)->count(),
            'total' => $sign->user->signs()->count()
        ]);
    }
    /**
     * Handle the Sign "created" event.
     */
    public function created(Sign $sign): void
    {
        $this->updateCount($sign);

        activity()
            ->causedBy($sign->user)
            ->performedOn($sign)
            ->withProperties([])
            ->log('sign');
    }

    /**
     * Handle the Sign "updated" event.
     */
    public function updated(Sign $sign): void
    {
        //
    }

    /**
     * Handle the Sign "deleted" event.
     */
    public function deleted(Sign $sign): void
    {
        $this->updateCount($sign);
    }

    /**
     * Handle the Sign "restored" event.
     */
    public function restored(Sign $sign): void
    {
        //
    }

    /**
     * Handle the Sign "force deleted" event.
     */
    public function forceDeleted(Sign $sign): void
    {
        //
    }
}
