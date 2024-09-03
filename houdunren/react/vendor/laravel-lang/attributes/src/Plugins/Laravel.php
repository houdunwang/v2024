<?php

declare(strict_types=1);

namespace LaravelLang\Attributes\Plugins;

use LaravelLang\Publisher\Plugins\Plugin;

class Laravel extends Plugin
{
    protected ?string $vendor = 'laravel/framework';

    public function files(): array
    {
        return [
            'validation.php' => '{locale}/validation.php',
        ];
    }
}
