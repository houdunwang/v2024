<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Services;

use Closure;
use Illuminate\Support\Facades\Route as BaseRoute;
use LaravelLang\Routes\Concerns\RouteParameters;
use LaravelLang\Routes\Helpers\Route as RouteName;
use LaravelLang\Routes\Middlewares\LocalizationByCookie;
use LaravelLang\Routes\Middlewares\LocalizationByHeader;
use LaravelLang\Routes\Middlewares\LocalizationByModel;
use LaravelLang\Routes\Middlewares\LocalizationByParameterPrefix;
use LaravelLang\Routes\Middlewares\LocalizationBySession;

class Route
{
    use RouteParameters;

    public function group(Closure $callback): void
    {
        BaseRoute::middleware([
            LocalizationByCookie::class,
            LocalizationByHeader::class,
            LocalizationBySession::class,
            LocalizationByModel::class,
        ])->group($callback);

        BaseRoute::prefix('{' . $this->names()->parameter . '}')
            ->name(RouteName::prefix())
            ->middleware([
                LocalizationByParameterPrefix::class,
                LocalizationByCookie::class,
                LocalizationByHeader::class,
                LocalizationBySession::class,
                LocalizationByModel::class,
            ])->group($callback);
    }
}
