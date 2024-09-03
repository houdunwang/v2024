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

namespace LaravelLang\Locales\Concerns;

use Illuminate\Support\Collection;
use LaravelLang\Config\Facades\Config;
use LaravelLang\LocaleList\Locale as LocaleEnum;
use LaravelLang\Locales\Data\LocaleData;

trait Mapping
{
    protected function map(string $locale, bool $withCountry, bool $withCurrency): LocaleData
    {
        $locale = $this->findLocale($locale);

        return new LocaleData(
            $locale,
            $this->mapData($locale),
            $this->localizedLocales(),
            $this->localizedCountries($withCountry),
            $this->localizedCurrencies($withCurrency)
        );
    }

    protected function mapLocales(array $locales, bool $withCountries, bool $withCurrencies): Collection
    {
        return collect($locales)->map(
            fn (string $locale) => $this->map($locale, $withCountries, $withCurrencies)
        );
    }

    protected function findLocale(string $locale): LocaleEnum
    {
        return LocaleEnum::tryFrom($this->toAlias($locale))
            ?: LocaleEnum::tryFrom($this->fromAlias($locale))
                ?: LocaleEnum::English;
    }

    protected function mapData(LocaleEnum $locale): array
    {
        return Config::hidden()->map->get($locale);
    }
}
