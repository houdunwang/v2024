<?php

declare(strict_types=1);

namespace LaravelLang\Actions\Plugins;

use LaravelLang\Publisher\Plugins\Plugin;

class Main extends Plugin
{
    public function files(): array
    {
        return [
            'actions.json' => '{locale}.json',
            'actions.php'  => '{locale}/actions.php',
        ];
    }
}
