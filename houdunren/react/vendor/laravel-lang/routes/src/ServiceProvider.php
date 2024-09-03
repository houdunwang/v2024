<?php

declare(strict_types=1);

namespace LaravelLang\Routes;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Routes\Facades\LocalizationRoute;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->registerGroup();
    }

    protected function registerGroup(): void
    {
        Route::macro('localizedGroup', fn (Closure $callback) => LocalizationRoute::group($callback));
    }
}
