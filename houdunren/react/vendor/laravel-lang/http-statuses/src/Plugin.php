<?php

declare(strict_types=1);

namespace LaravelLang\HttpStatuses;

use LaravelLang\HttpStatuses\Plugins\Main;
use LaravelLang\Publisher\Plugins\Provider;

class Plugin extends Provider
{
    protected string $base_path = __DIR__ . '/../';

    protected array $plugins = [
        Main::class,
    ];
}
