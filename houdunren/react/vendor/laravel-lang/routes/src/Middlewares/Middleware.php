<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Middlewares;

use Closure;
use Illuminate\Http\Request;
use LaravelLang\Locales\Data\LocaleData;
use LaravelLang\Locales\Facades\Locales;
use LaravelLang\Routes\Concerns\RouteParameters;
use LaravelLang\Routes\Events\LocaleHasBeenSetEvent;

use function app;
use function trim;

abstract class Middleware
{
    use RouteParameters;

    abstract protected function detect(Request $request): bool|float|int|string|null;

    public function __invoke(Request $request, Closure $next)
    {
        if ($locale = $this->getLocale($request)) {
            $this->setLocale($locale->code);
            $this->event($locale);
        }

        return $next($this->forgetParameter($request));
    }

    protected function getLocale(Request $request): ?LocaleData
    {
        if ($locale = $this->trim($this->detect($request))) {
            return Locales::get($locale);
        }

        return null;
    }

    protected function setLocale(string $locale): void
    {
        app()->setLocale($locale);
    }

    protected function event(LocaleData $locale): void
    {
        LocaleHasBeenSetEvent::dispatch($locale);
    }

    protected function trim(bool|float|int|string|null $locale): string
    {
        return trim((string) $locale);
    }

    protected function forgetParameter(Request $request): Request
    {
        $request->route()->forgetParameter(
            $this->names()->parameter
        );

        return $request;
    }
}
