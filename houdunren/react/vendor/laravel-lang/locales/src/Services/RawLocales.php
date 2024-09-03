<?php

/**
 * This file is part of the "laravel-lang/locales" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2024 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

namespace LaravelLang\Locales\Services;

use DragonCode\Support\Facades\Filesystem\Path;
use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Locales\Concerns\Aliases;
use LaravelLang\Locales\Concerns\Application;
use LaravelLang\Locales\Concerns\Pathable;
use LaravelLang\Locales\Concerns\Registry;
use LaravelLang\Locales\Data\LocaleData;

class RawLocales
{
    use Aliases;
    use Application;
    use Pathable;
    use Registry;

    public function available(): array
    {
        return $this->registry(__METHOD__, fn () => collect(Locale::cases())
            ->map(fn (Locale $locale) => $this->toAlias($locale))
            ->filter()
            ->sort()
            ->values()
            ->all()
        );
    }

    public function installed(bool $withProtects = true): array
    {
        return $this->registry([__METHOD__, $withProtects], function () use ($withProtects) {
            if ($this->directoryDoesntExist()) {
                return $withProtects ? $this->protects() : [];
            }

            return collect()
                ->push(
                    $this->directories(),
                    $this->jsons(),
                    $this->protects(),
                )
                ->flatten()
                ->map(fn (string $name) => $this->toAlias(Path::filename($name)))
                ->filter(fn (?string $locale) => $this->isAvailable($locale))
                ->when(! $withProtects, fn (Collection $items) => $items->filter(
                    fn (string $locale) => ! $this->isProtected($locale)
                ))
                ->unique()
                ->sort()
                ->values()
                ->all();
        });
    }

    public function notInstalled(): array
    {
        return $this->registry(__METHOD__, fn () => array_values(array_diff($this->available(), $this->installed())));
    }

    public function protects(): array
    {
        return $this->registry(__METHOD__, fn () => collect([
            $this->getDefault(),
            $this->getFallback(),
        ])->filter()->unique()->sort()->values()->all());
    }

    public function isAvailable(Locale|LocaleData|string|null $locale): bool
    {
        $locales = $this->available();

        return $this->inArray($this->toAlias($locale), $locales)
            || $this->inArray($this->fromAlias($locale), $locales);
    }

    public function isInstalled(Locale|LocaleData|string|null $locale): bool
    {
        return $this->registry([__METHOD__, $locale], function () use ($locale) {
            $locales = $this->installed();

            return $this->inArray($this->fromAlias($locale), $locales)
                || $this->inArray($this->toAlias($locale), $locales);
        });
    }

    public function isProtected(Locale|LocaleData|string|null $locale): bool
    {
        return $this->registry([__METHOD__, $locale], function () use ($locale) {
            $locales = $this->protects();

            return $this->inArray($this->fromAlias($locale), $locales)
                || $this->inArray($this->toAlias($locale), $locales);
        });
    }

    public function get(mixed $locale): string
    {
        return $this->registry([__METHOD__, $locale, $this->appLocale()], function () use ($locale) {
            $locale = Resolver::fromMixed($locale);

            if ($this->isInstalled($locale)) {
                return $this->toAlias($locale);
            }

            return $this->getDefault();
        });
    }

    public function getDefault(): string
    {
        return $this->registry([__METHOD__, $this->appLocale()], function () {
            $locale = config('app.locale');

            return $this->toAlias(
                $this->isAvailable($locale) ? $locale : $this->getFallback()
            );
        });
    }

    public function getCurrent(): string
    {
        return app()->getLocale();
    }

    public function getFallback(): string
    {
        return $this->registry([__METHOD__, $this->appLocale()], function () {
            $locale = config('app.fallback_locale');

            if ($this->isAvailable($locale)) {
                return $this->toAlias($locale);
            }

            $fallback = config('app.locale');

            return $this->toAlias(
                $this->isAvailable($fallback) ? $fallback : Locale::English->value
            );
        });
    }

    public function info(mixed $locale): string
    {
        return $this->registry([__METHOD__, $locale, $this->appLocale()], function () use ($locale) {
            $locale = Resolver::fromMixed($locale);

            if ($this->isAvailable($locale)) {
                return $this->toAlias($locale);
            }

            return $this->getDefault();
        });
    }

    protected function inArray(Locale|LocaleData|string|null $locale, array $haystack): bool
    {
        $locale = Resolver::toString($locale);

        return ! empty($locale) && in_array($locale, $haystack, true);
    }
}
