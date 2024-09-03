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

namespace LaravelLang\NativeLocaleNames\Helpers;

use LaravelLang\NativeLocaleNames\Enums\SortBy;

class Arr
{
    public static function sortBy($array, SortBy $sortBy): array
    {
        if ($sortBy === SortBy::None) {
            return $array;
        }

        return $sortBy === SortBy::Key ? static::ksort($array) : static::sort($array);
    }

    public static function sort($array): array
    {
        asort($array);

        return $array;
    }

    public static function ksort($array): array
    {
        ksort($array);

        return $array;
    }
}
