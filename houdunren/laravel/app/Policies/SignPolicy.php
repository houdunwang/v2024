<?php

namespace App\Policies;

use App\Models\Sign;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class SignPolicy
{
    public function before($user, $ability)
    {
        if (isAdministrator()) return true;
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
    public function view(User $user, Sign $sign): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Sign $sign): bool
    {
        return Auth::check() && $user->id == $sign->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sign $sign): bool
    {
        return Auth::check() && $user->id == $sign->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sign $sign): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sign $sign): bool
    {
        //
    }
}
