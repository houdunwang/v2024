<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Facades;

use Closure;
use Illuminate\Support\Facades\Facade;
use LaravelLang\Routes\Services\Route;

/**
 * @method static void group(Closure $callback)
 */
class LocalizationRoute extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Route::class;
    }
}
