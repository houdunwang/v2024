<?php

declare(strict_types=1);

namespace LaravelLang\Config;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Config\Enums\Name;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->bootPublishes();
        }
    }

    protected function bootPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../config/public.php' => $this->app->configPath(Name::Shared() . '.php'),
        ], ['config', Name::Shared()]);
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/public.php', Name::Shared());
        $this->mergeConfigFrom(__DIR__ . '/../config/private.php', Name::Hidden());
    }
}
