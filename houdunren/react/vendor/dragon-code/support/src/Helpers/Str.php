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

namespace DragonCode\Support\Helpers;

use DragonCode\Support\Facades\Helpers\Arr as ArrHelper;
use DragonCode\Support\Facades\Instances\Call;
use DragonCode\Support\Facades\Instances\Call as CallHelper;
use DragonCode\Support\Facades\Tools\Replace;
use Exception;
use Illuminate\Contracts\Support\DeferringDisplayableValue;
use Illuminate\Contracts\Support\Htmlable;
use voku\helper\ASCII;

class Str
{
    protected array $escaping_methods = [
        DeferringDisplayableValue::class => 'resolveDisplayableValue',
        Htmlable::class                  => 'toHtml',
    ];

    /** The cache of snake-cased words. */
    protected static array $snakeCache = [];

    /** The cache of camel-cased words. */
    protected static array $camelCache = [];

    /** The cache of studly-cased words. */
    protected static array $studlyCache = [];

    /**
     * Get a new stringable object from the given string.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function of(?string $value): Ables\Stringable
    {
        return new Ables\Stringable($value);
    }

    /**
     * Escape HTML special characters in a string.
     */
    public function e(?string $value, bool $double = true): ?string
    {
        if ($escaped = CallHelper::runOf($this->escaping_methods, $value)) {
            return $escaped;
        }

        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $double);
    }

    /**
     * Convert special HTML entities back to characters.
     */
    public function de(?string $value): ?string
    {
        return htmlspecialchars_decode($value, ENT_QUOTES);
    }

    /**
     * Replacing multiple spaces with a single space.
     *
     * @see https://laravel.com/docs/9.x/helpers#method-str-squish
     */
    public function squish(?string $value): ?string
    {
        $value = $this->pregReplace($value, '~^[\s\x{FEFF}]+|[\s\x{FEFF}]+$~u', '');

        return $this->pregReplace($value, '~(\s|\x{3164}|\x{1160})+~u', ' ');
    }

    /**
     * Get a string according to an integer value.
     */
    public function choice(float $number, array $choice = [], ?string $extra = null): string
    {
        $number = (int) $number;
        $mod    = $number % 10;

        switch (true) {
            case $mod === 0:
            case $mod >= 5             && $mod <= 9:
            case ($number % 100 >= 11) && ($number % 100 <= 20):
                $result = $choice[2] ?? '';
                break;
            case $mod >= 2 && $mod <= 4:
                $result = $choice[1] ?? '';
                break;

            default:
                $result = $choice[0] ?? '';
        }

        if (empty($extra)) {
            return trim($result);
        }

        return implode(' ', [trim($result), trim($extra)]);
    }

    /**
     * Begin a string with a single instance of a given value.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function start(?string $value, string $prefix): string
    {
        $quoted = preg_quote($prefix, '/');

        return $prefix . preg_replace('/^(?:' . $quoted . ')+/u', '', $value);
    }

    /**
     * End a string with a single instance of a given value.
     */
    public function end(?string $value, string $suffix): string
    {
        $quoted = preg_quote($suffix, '/');

        return preg_replace('/^(?:' . $quoted . ')+/u', '', $value) . $suffix;
    }

    /**
     * Adds a substring to the end of a string.
     */
    public function append(mixed $value, string $suffix): string
    {
        return $value . $suffix;
    }

    /**
     * Adds a substring to the start of a string.
     */
    public function prepend(mixed $value, string $prefix): string
    {
        return $prefix . $value;
    }

    /**
     * Cap a string with a single instance of a given value.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function finish(string $value, string $cap = '/'): string
    {
        $quoted = preg_quote($cap, '/');

        return preg_replace('/(?:' . $quoted . ')+$/u', '', $value) . $cap;
    }

    /**
     * Determine if a given string matches a given pattern.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function is(array|string $pattern, mixed $value): bool
    {
        $patterns = ArrHelper::wrap($pattern);

        $value = (string) $value;

        if (empty($patterns)) {
            return false;
        }

        foreach ($patterns as $pattern) {
            $pattern = (string) $pattern;

            // If the given value is an exact match we can of course return true right
            // from the beginning. Otherwise, we will translate asterisks and do an
            // actual pattern match against the two strings to see if they match.
            if ($pattern == $value) {
                return true;
            }

            $pattern = preg_quote($pattern, '#');

            // Asterisks are translated into zero-or-more regular expression wildcards
            // to make it convenient to check if the strings starts with the given
            // pattern such as "library/*", making any string check convenient.
            $pattern = str_replace('\*', '.*', $pattern);

            if (preg_match('#^' . $pattern . '\z#u', $value) === 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string|array<string>  $needles
     */
    public function startsWith(string $haystack, mixed $needles): bool
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle !== '' && str_starts_with($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string|array<string>  $needles
     */
    public function endsWith(string $haystack, mixed $needles): bool
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle !== '' && str_ends_with($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Convert the given string to lower-case.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function lower(?string $value): string
    {
        return mb_strtolower($value, 'UTF-8');
    }

    /**
     * Convert the given string to upper-case.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function upper(?string $value): ?string
    {
        return mb_strtoupper($value, 'UTF-8');
    }

    /**
     * Convert a value to studly caps case.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function studly(?string $value): ?string
    {
        $key = $value;

        if (isset(self::$studlyCache[$key])) {
            return self::$studlyCache[$key];
        }

        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        return self::$studlyCache[$key] = str_replace(' ', '', $value);
    }

    /**
     * Convert a value to camel case.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function camel(?string $value): ?string
    {
        if (isset(self::$camelCache[$value])) {
            return self::$camelCache[$value];
        }

        return self::$camelCache[$value] = lcfirst($this->studly($value));
    }

    /**
     * Convert a string to snake case.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function snake(?string $value, string $delimiter = '_'): ?string
    {
        $key = $value;

        if (isset(self::$snakeCache[$key][$delimiter])) {
            return self::$snakeCache[$key][$delimiter];
        }

        if (! ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', ucwords($value));

            $value = $this->lower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value));
        }

        return self::$snakeCache[$key][$delimiter] = $value;
    }

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function slug(string $title, string $separator = '-', ?string $language = 'en'): string
    {
        $title = $language ? $this->ascii($title, $language) : $title;

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator . 'at' . $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', $this->lower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }

    /**
     * Convert the given string to title case.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function title(?string $value): ?string
    {
        if (is_numeric($value)) {
            return $value;
        }

        return mb_convert_case((string) $value, MB_CASE_TITLE, 'UTF-8') ?: null;
    }

    /**
     * Return the length of the given string.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function length(?string $value, ?string $encoding = null): int
    {
        return $encoding
            ? mb_strlen($value, $encoding)
            : mb_strlen($value);
    }

    /**
     * Count the number of substring occurrences.
     */
    public function count(?string $value, string $needle, int $offset = 0): int
    {
        return substr_count((string) $value, $needle, $offset);
    }

    /**
     * Returns the portion of string specified by the start and length parameters.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function substr(string $string, int $start, ?int $length = null): ?string
    {
        return mb_substr($string, $start, $length, 'UTF-8');
    }

    /**
     * Replace all occurrences of the search string with the replacement string by format.
     */
    public function replaceFormat(string $template, array $values, ?string $key_format = null): string
    {
        $keys = Replace::toFormatArray(array_keys($values), $key_format);

        return $this->replace($template, $keys, array_values($values));
    }

    /**
     * Replace all occurrences of the search string with the replacement string.
     *
     * @param  array|string|array<string>|int|float  $search
     * @param  array|string|array<string>|int|float|null  $replace
     */
    public function replace(?string $value, mixed $search, mixed $replace = null): string
    {
        if (is_null($replace) && is_array($search)) {
            $replace = array_values($search);
            $search  = array_keys($search);
        }

        return str_replace($search, $replace, (string) $value);
    }

    /**
     * Get the portion of a string before the first occurrence of a given value.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function before(string $subject, string $search): ?string
    {
        return ! empty($search) ? explode($search, $subject)[0] : null;
    }

    /**
     * Return the remainder of a string after the first occurrence of a given value.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function after(string $subject, string $search): ?string
    {
        return ! empty($search) ? array_reverse(explode($search, $subject, 2))[0] : null;
    }

    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string|array<string>  $needles
     */
    public function contains(string $haystack, mixed $needles): bool
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle !== '' && str_contains($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     *
     * @throws Exception
     */
    public function random(int $length = 16): string
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }

    /**
     * Get the string matching the given pattern.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function match(string $value, string $pattern): ?string
    {
        preg_match($pattern, $value, $matches);

        return ! $matches ? null : ($matches[1] ?? $matches[0]);
    }

    /**
     * Get the all string matching the given pattern.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function matchAll(string $value, string $pattern): ?array
    {
        preg_match_all($pattern, $value, $matches);

        return empty($matches[0]) ? null : ($matches[1] ?? $matches[0]);
    }

    /**
     * Determine if a given string contains a given substring by regex.
     */
    public function matchContains(string $value, array|string $pattern): bool
    {
        foreach ((array) $pattern as $item) {
            if ($this->match($value, $item) !== null) {
                return true;
            }
        }

        return false;
    }

    /**
     * Replace a given value in the string.
     */
    public function pregReplace(?string $value, string $pattern, string $replacement): ?string
    {
        return preg_replace($pattern, $replacement, (string) $value);
    }

    /**
     * Determines if the value is empty.
     */
    public function isEmpty(mixed $value): bool
    {
        $value = is_string($value) ? trim($value) : $value;

        return empty($value) && ! is_numeric($value) && (is_string($value) || is_null($value));
    }

    /**
     * Determines if the value is doesn't empty.
     */
    public function doesntEmpty(mixed $value): bool
    {
        return ! $this->isEmpty($value);
    }

    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function ascii(?string $value, ?string $language = 'en'): string
    {
        return ASCII::to_ascii((string) $value, $language);
    }

    /**
     * Converts a value to a string.
     */
    public function toString(?string $value): string
    {
        return is_null($value) ? 'null' : $value;
    }

    /**
     * Using a call-back function to process a value.
     */
    public function map(?string $value, callable $callback): ?string
    {
        return Call::callback($callback, $value);
    }

    /**
     * Get the portion of a string between two given values.
     */
    public function between(?string $value, mixed $from, mixed $to, bool $trim = true): string
    {
        return $this->of($value)
            ->before($to)
            ->after($from)
            ->when($trim, fn ($value) => $this->trim($value))
            ->toString();
    }

    /**
     * Strip whitespace (or other characters) from the beginning and end of a string.
     */
    public function trim(?string $string, string $characters = " \t\n\r\0\x0B"): string
    {
        return trim((string) $string, $characters);
    }

    /**
     * Strip whitespace (or other characters) from the beginning of a string.
     */
    public function ltrim(?string $string, string $characters = " \t\n\r\0\x0B"): string
    {
        return ltrim((string) $string, $characters);
    }

    /**
     * Strip whitespace (or other characters) from the end of a string.
     */
    public function rtrim(?string $string, string $characters = " \t\n\r\0\x0B"): string
    {
        return rtrim((string) $string, $characters);
    }
}
