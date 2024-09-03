<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Helpers;

use LaravelLang\Config\Facades\Config;

class Route
{
    public static function prefix(): string
    {
        return Config::shared()->routes->namePrefix;
    }

    public static function redirect(): bool
    {
        return Config::shared()->routes->redirect;
    }
}
