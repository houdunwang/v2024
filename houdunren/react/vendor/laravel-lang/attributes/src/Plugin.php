<?php

declare(strict_types=1);

namespace LaravelLang\Attributes;

use LaravelLang\Attributes\Plugins\Laravel;
use LaravelLang\Attributes\Plugins\Lumen;
use LaravelLang\Publisher\Plugins\Provider;

class Plugin extends Provider
{
    protected ?string $package_name = 'laravel-lang/attributes';

    protected string $base_path = __DIR__ . '/../';

    protected array $plugins = [
        Laravel::class,
        Lumen::class,
    ];
}
