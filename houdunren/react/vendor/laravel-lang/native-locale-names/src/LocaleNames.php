<?php

/**
 * This file is part of the "laravel-lang/native-locale-names" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

namespace LaravelLang\NativeLocaleNames;

use BackedEnum;
use LaravelLang\NativeLocaleNames\Enums\SortBy;
use LaravelLang\NativeLocaleNames\Helpers\Arr;
use LaravelLang\NativeLocaleNames\Helpers\Path;
use LaravelLang\NativeLocaleNames\Services\Filesystem;

class LocaleNames
{
    public static string $default = '_native';

    public static function get(BackedEnum|string|null $locale = null, SortBy $sortBy = SortBy::None): array
    {
        if ($locale = static::locale($locale)) {
            return static::forLocale($locale, $sortBy);
        }

        return static::forLocale(static::$default, $sortBy);
    }

    protected static function forLocale(string $locale, SortBy $sortBy): array
    {
        return Arr::sortBy(static::load(static::path($locale)), $sortBy);
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
