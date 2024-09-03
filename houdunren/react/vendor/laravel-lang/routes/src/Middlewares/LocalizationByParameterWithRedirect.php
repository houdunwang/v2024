<?php

declare(strict_types=1);

namespace LaravelLang\Routes\Middlewares;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use LaravelLang\Locales\Facades\Locales;
use LaravelLang\Routes\Concerns\RouteParameters;

use function array_merge;
use function in_array;
use function response;

class LocalizationByParameterWithRedirect extends Middleware
{
    use RouteParameters;

    public function __invoke(Request $request, Closure $next)
    {
        if ($this->present($request) && $this->invalidParameter($request) && ($name = $this->routeName($request))) {
            return $this->redirect($name, $this->parameters($request));
        }

        return parent::__invoke($request, $next);
    }

    protected function detect(Request $request): bool|float|int|string|null
    {
        return $request->route()?->parameter($this->names()->parameter);
    }

    protected function invalidParameter(Request $request): ?bool
    {
        return ! $this->hasParameter($request)
            || ! $this->trim($this->detect($request))
            || ! $this->isInstalled($this->detect($request));
    }

    protected function hasParameter(Request $request): bool
    {
        return (bool) $request->route()?->hasParameter($this->names()->parameter);
    }

    protected function present(Request $request): bool
    {
        return in_array($this->names()->parameter, $request->route()->parameterNames(), true);
    }

    protected function parameters(Request $request): array
    {
        return array_merge($request->route()?->parameters() ?? [], [
            $this->names()->parameter => $this->defaultLocale(),
        ]);
    }

    protected function routeName(Request $request): ?string
    {
        return $request->route()?->getName();
    }

    protected function redirect(string $name, array $parameters): RedirectResponse
    {
        return response()->redirectToRoute($name, $parameters);
    }

    protected function defaultLocale(): string
    {
        return Locales::getDefault()->code;
    }

    protected function isInstalled(bool|float|int|string|null $locale): bool
    {
        return Locales::isInstalled((string) $locale);
    }
}
