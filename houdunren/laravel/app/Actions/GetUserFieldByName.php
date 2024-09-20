<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class GetUserFieldByName
{
    use AsAction;

    public function handle(string $name)
    {
        $user = GetUserByName::run($name);
        return $user->email == $name ? 'email' : ($name == $user->name ? 'name' : 'mobile');
    }
}
