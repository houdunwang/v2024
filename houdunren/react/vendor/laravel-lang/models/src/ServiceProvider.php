<?php

declare(strict_types=1);

namespace LaravelLang\Models;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Models\Console\ModelMakeCommand;
use LaravelLang\Models\Console\ModelsHelperCommand;
use LaravelLang\Models\Services\Registry;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->registry();
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole() || $this->app->runningUnitTests()) {
            $this->bootCommands();
        }
    }

    protected function bootCommands(): void
    {
        $this->commands([
            ModelsHelperCommand::class,
            ModelMakeCommand::class,
        ]);
    }

    protected function registry(): void
    {
        $this->app->singleton(Registry::class, fn () => new Registry());
    }
}
