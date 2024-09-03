<?php

/**
 * This file is part of the "laravel-lang/native-currency-names" project.
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

namespace LaravelLang\NativeCurrencyNames\Helpers;

class Path
{
    public static function resolve(string $locale, bool $real = true): bool|string
    {
        $path = __DIR__ . '/../../data/' . $locale . '.json';

        return $real ? realpath($path) : $path;
    }

    public static function exists(string $locale): bool
    {
        return static::resolve($locale) !== false;
    }
}
