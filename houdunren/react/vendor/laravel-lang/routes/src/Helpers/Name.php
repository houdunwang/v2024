<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Helpers;

use LaravelLang\Config\Data\Shared\RouteNameData;
use LaravelLang\Config\Facades\Config;

class Name
{
    public static function all(): RouteNameData
    {
        return Config::shared()->routes->names;
    }

    public static function parameter(): string
    {
        return static::all()->parameter;
    }

    public static function header(): string
    {
        return static::all()->header;
    }

    public static function cookie(): string
    {
        return static::all()->cookie;
    }

    public static function session(): string
    {
        return static::all()->session;
    }
}
