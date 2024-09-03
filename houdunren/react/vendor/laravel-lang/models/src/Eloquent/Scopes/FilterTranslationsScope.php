<?php

declare(strict_types=1);

namespace LaravelLang\Models\Eloquent\Scopes;

use Illuminate\Database\Eloquent\Builder;
use LaravelLang\Config\Facades\Config;
use LaravelLang\Locales\Facades\Locales;

use function array_unique;

class FilterTranslationsScope
{
    public function __invoke(Builder $builder): void
    {
        if ($this->enabled()) {
            $builder->whereIn('locale', $this->locales());
        }
    }

    protected function enabled(): bool
    {
        return Config::shared()->models->filter->enabled;
    }

    protected function locales(): array
    {
        return array_unique([
            Locales::getCurrent()->code,
            Locales::getFallback()->code,
        ]);
    }
}
