<?php

/*
 * This file is part of the "dragon-code/support" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2024 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/support
 */

namespace DragonCode\Support\Facades\Helpers;

use DragonCode\Support\Facades\Facade;
use DragonCode\Support\Helpers\Ables\Stringable;
use DragonCode\Support\Helpers\Str as Helper;

/**
 * @method static Stringable of(?string $value)
 * @method static array|null matchAll(string $value, string $pattern)
 * @method static bool contains(string $haystack, $needles)
 * @method static bool doesntEmpty($value)
 * @method static bool endsWith(string $haystack, string|string[] $needles)
 * @method static bool is(string|array $pattern, mixed $value)
 * @method static bool isEmpty($value)
 * @method static bool matchContains(string $value, array|string $pattern)
 * @method static bool startsWith(string $haystack, string|string[] $needles)
 * @method static int count(?string $value, string $needle, int $offset = 0)
 * @method static int length(?string $value, string $encoding = null)
 * @method static string append(mixed $value, string $suffix)
 * @method static string ascii(?string $value, string $language = 'en')
 * @method static string between(?string $value, mixed $from, mixed $to, bool $trim = true)
 * @method static string ltrim(?string $string, string $characters = " \t\n\r\0\x0B")
 * @method static string prepend(mixed $value, string $prefix)
 * @method static string random(int $length = 16)
 * @method static string replace(string $template, array|string|int|float $search, array|string|int|float|null $replace = null)
 * @method static string replaceFormat(string $template, array $values, string $key_format = null)
 * @method static string rtrim(?string $string, string $characters = " \t\n\r\0\x0B")
 * @method static string slug(string $title, string $separator = '-', ?string $language = 'en')
 * @method static string toString(?string $value)
 * @method static string trim(?string $string, string $characters = " \t\n\r\0\x0B")
 * @method static string|null after(string $subject, string $search)
 * @method static string|null before(string $subject, string $search)
 * @method static string|null camel(?string $value)
 * @method static string|null choice(float $number, array $choice = [], string $extra = null)
 * @method static string|null de(?string $value)
 * @method static string|null e(?string $value, bool $double = true)
 * @method static string|null end(?string $value, string $suffix)
 * @method static string|null finish(string $value, string $cap = '/')
 * @method static string|null lower(?string $value)
 * @method static string|null map(?string $value, callable $callback)
 * @method static string|null match(string $value, string $pattern)
 * @method static string|null pregReplace(?string $value, string $pattern, string $replacement)
 * @method static string|null snake(?string $value, string $delimiter = '_')
 * @method static string|null squish(?string $value)
 * @method static string|null start(?string $value, string $prefix)
 * @method static string|null studly(?string $value)
 * @method static string|null substr(string $string, int $start, int $length = null)
 * @method static string|null title(?string $value)
 * @method static string|null upper(?string $value)
 */
class Str extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Helper::class;
    }
}
