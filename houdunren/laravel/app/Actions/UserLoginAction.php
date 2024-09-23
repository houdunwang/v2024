<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class UserLoginAction
{
    use AsAction;

    public function handle(User $user)
    {
        return ['token' => $user->createToken('app')->plainTextToken, 'user' => $user];
    }
}
