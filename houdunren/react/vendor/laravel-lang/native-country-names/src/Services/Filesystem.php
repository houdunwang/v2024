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

namespace LaravelLang\NativeCountryNames\Services;

use DragonCode\Support\Facades\Filesystem\File;

class Filesystem
{
    public static function load(string $path): array
    {
        if (file_exists($path)) {
            return File::load($path);
        }

        return [];
    }

    public static function store(string $path, array $content): void
    {
        File::store($path, json_encode($content, static::flags()) . PHP_EOL);
    }

    protected static function flags(): int
    {
        return env('PRETTY_JSON') === true
            ? JSON_UNESCAPED_UNICODE ^ JSON_UNESCAPED_SLASHES ^ JSON_PRETTY_PRINT
            : JSON_UNESCAPED_UNICODE ^ JSON_UNESCAPED_SLASHES;
    }
}
