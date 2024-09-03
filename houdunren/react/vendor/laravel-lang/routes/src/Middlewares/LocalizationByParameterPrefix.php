<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Middlewares;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use LaravelLang\Config\Facades\Config;
use LaravelLang\Locales\Facades\Locales;
use LaravelLang\Routes\Helpers\Route;

class LocalizationByParameterPrefix extends LocalizationByParameterWithRedirect
{
    protected function parameters(Request $request): array
    {
        return Arr::except($request->route()?->parameters() ?? [], [
            $this->names()->parameter,
        ]);
    }

    protected function routeName(Request $request): ?string
    {
        if ($name = $request->route()?->getName()) {
            return Str::after($name, $this->routePrefix());
        }

        return null;
    }

    protected function invalidParameter(Request $request): ?bool
    {
        return ! $this->hasParameter($request)
            || ! $this->trim($this->detect($request))
            || ! $this->isInstalled($this->detect($request))
            || $this->isDefault($this->detect($request));
    }

    protected function isDefault(bool|float|int|string|null $locale): bool
    {
        if ($this->allowRedirect()) {
            return Locales::info($locale)->code === Locales::getDefault()->code;
        }

        return false;
    }

    protected function routePrefix(): string
    {
        return Route::prefix();
    }

    protected function allowRedirect(): bool
    {
        return Config::shared()->routes->redirect;
    }
}
