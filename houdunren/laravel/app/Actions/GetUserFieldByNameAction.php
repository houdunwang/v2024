<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GetUserFieldByNameAction
{
    use AsAction;

    public function handle(string $name)
    {
        $user = GetUserByNameAction::run($name);
        return $user->email == $name ? 'email' : ($name == $user->name ? 'name' : 'mobile');
    }
}
