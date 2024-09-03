<?php

/**
 * This file is part of the "laravel-lang/native-country-names" project.
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

namespace LaravelLang\NativeCountryNames;

use BackedEnum;
use Illuminate\Support\Collection;
use LaravelLang\NativeCountryNames\Data\CountryData;
use LaravelLang\NativeCountryNames\Enums\SortBy;
use LaravelLang\NativeCountryNames\Helpers\Path;
use LaravelLang\NativeCountryNames\Services\Filesystem;

class CountryNames
{
    public static string $default = '_native';

    /**
     * @return Collection<CountryData>
     */
    public static function get(BackedEnum|string|null $locale = null, SortBy $sortBy = SortBy::None): Collection
    {
        if ($locale = static::locale($locale)) {
            return static::forLocale($locale, $sortBy);
        }

        return static::forLocale(static::$default, $sortBy);
    }

    protected static function forLocale(string $locale, SortBy $sortBy): Collection
    {
        return collect(static::load(static::path($locale)))
            ->when($sortBy === SortBy::Key, fn (Collection $items) => $items->sortKeys())
            ->when($sortBy === SortBy::Value, fn (Collection $items) => $items->sortBy('name'))
            ->map(fn (array $item) => new CountryData($item['code'], $item['native'], $item['localized']));
    }

    protected static function load(string $path): array
    {
        return Filesystem::load($path);
    }

    protected static function path(string $locale): bool|string
    {
        return Path::resolve($locale) ?: Path::resolve(static::$default);
    }

    protected static function locale(BackedEnum|string|null $locale): ?string
    {
        if (empty($locale)) {
            return null;
        }

        if ($locale instanceof BackedEnum) {
            $locale = $locale->value;
        }

        return Path::exists((string) $locale) ? $locale : null;
    }
}
