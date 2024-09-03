<?php

declare(strict_types=1);

namespace LaravelLang\Config\Helpers;

use Illuminate\Support\Env;

use function base_path;

class Path
{
    public static function app(): string
    {
        return base_path('app');
    }

    public static function helpers(): string
    {
        return static::vendor() . '/_laravel_lang';
    }

    public static function vendor(): string
    {
        return Env::get('COMPOSER_VENDOR_DIR') ?: base_path('vendor');
    }
}
