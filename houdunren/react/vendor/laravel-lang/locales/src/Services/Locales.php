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

use Illuminate\Support\Collection;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Locales\Concerns\Aliases;
use LaravelLang\Locales\Concerns\Application;
use LaravelLang\Locales\Concerns\Localized;
use LaravelLang\Locales\Concerns\Mapping;
use LaravelLang\Locales\Concerns\Registry;
use LaravelLang\Locales\Data\LocaleData;

class Locales
{
    use Aliases;
    use Application;
    use Localized;
    use Mapping;
    use Registry;

    public function __construct(
        protected RawLocales $raw
    ) {}

    public function raw(): RawLocales
    {
        return $this->raw;
    }

    public function available(bool $withCountries = false, bool $withCurrencies = false): Collection
    {
        return $this->registry(
            __METHOD__,
            fn () => $this->mapLocales($this->raw->available(), $withCountries, $withCurrencies)
        );
    }

    public function installed(
        bool $withProtects = true,
        bool $withCountries = false,
        bool $withCurrencies = false
    ): Collection {
        return $this->registry(
            [__METHOD__, $withProtects],
            fn () => $this->mapLocales($this->raw->installed($withProtects), $withCountries, $withCurrencies)
        );
    }

    public function notInstalled(bool $withCountries = false, bool $withCurrencies = false): Collection
    {
        return $this->registry(
            __METHOD__,
            fn () => $this->mapLocales($this->raw->notInstalled(), $withCountries, $withCurrencies)
        );
    }

    public function protects(bool $withCountries = false, bool $withCurrencies = false): Collection
    {
        return $this->registry(
            __METHOD__,
            fn () => $this->mapLocales($this->raw->protects(), $withCountries, $withCurrencies)
        );
    }

    public function isAvailable(Locale|LocaleData|string|null $locale): bool
    {
        return $this->raw->isAvailable($locale);
    }

    public function isInstalled(Locale|LocaleData|string|null $locale): bool
    {
        return $this->raw->isInstalled($locale);
    }

    public function isProtected(Locale|LocaleData|string|null $locale): bool
    {
        return $this->raw->isProtected($locale);
    }

    public function get(mixed $locale, bool $withCountry = false, bool $withCurrency = false): LocaleData
    {
        return $this->registry(
            [__METHOD__, $locale, $this->appLocale()],
            fn () => $this->map($this->raw->get($locale), $withCountry, $withCurrency)
        );
    }

    public function info(mixed $locale, bool $withCountry = false, bool $withCurrency = false): LocaleData
    {
        return $this->registry(
            [__METHOD__, $locale, $this->appLocale()],
            fn () => $this->map($this->raw->info($locale), $withCountry, $withCurrency)
        );
    }

    public function getCurrent(bool $withCountry = false, bool $withCurrency = false): LocaleData
    {
        return $this->getDefault($withCountry, $withCurrency);
    }

    public function getDefault(bool $withCountry = false, bool $withCurrency = false): LocaleData
    {
        return $this->registry(
            [__METHOD__, $this->appLocale()],
            fn () => $this->map($this->raw->getDefault(), $withCountry, $withCurrency)
        );
    }

    public function getFallback(bool $withCountry = false, bool $withCurrency = false): LocaleData
    {
        return $this->registry(
            [__METHOD__, $this->appLocale()],
            fn () => $this->map($this->raw->getFallback(), $withCountry, $withCurrency)
        );
    }

    public function set(mixed $locale): void
    {
        if ($this->isInstalled($locale)) {
            app()->setLocale($this->raw->get($locale));
        }
    }
}
