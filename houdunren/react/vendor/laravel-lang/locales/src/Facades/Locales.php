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

namespace LaravelLang\Locales\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Locales\Data\LocaleData;
use LaravelLang\Locales\Services\Locales as Service;
use LaravelLang\Locales\Services\RawLocales;

/**
 * @method static bool isAvailable(LocaleData|Locale|string|null $locale)
 * @method static bool isInstalled(LocaleData|Locale|string|null $locale)
 * @method static bool isProtected(LocaleData|Locale|string|null $locale)
 * @method static Collection<LocaleData> available(bool $withCountries = false, bool $withCurrencies = false)
 * @method static Collection<LocaleData> installed(bool $withProtects = true, bool $withCountries = false, bool $withCurrencies = false)
 * @method static Collection<LocaleData> notInstalled(bool $withCountries = false, bool $withCurrencies = false)
 * @method static Collection<LocaleData> protects(bool $withCountries = false, bool $withCurrencies = false)
 * @method static LocaleData get(mixed $locale, bool $withCountry = false, bool $withCurrency = false)
 * @method static LocaleData getCurrent(bool $withCountry = false, bool $withCurrency = false)
 * @method static LocaleData getDefault(bool $withCountry = false, bool $withCurrency = false)
 * @method static LocaleData getFallback(bool $withCountry = false, bool $withCurrency = false)
 * @method static LocaleData info(mixed $locale, bool $withCountry = false, bool $withCurrency = false)
 * @method static RawLocales raw()
 * @method static void set(mixed $locale)
 */
class Locales extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Service::class;
    }
}
