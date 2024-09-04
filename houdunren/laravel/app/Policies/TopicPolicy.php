<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TopicPolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isAdministrator) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Topic $topic): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return !$user->is_lock;
    }

    public function update(User $user, Topic $topic): bool
    {
        return $user->id === $topic->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Topic $topic): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Topic $topic): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Topic $topic): bool
    {
        //
    }
}
