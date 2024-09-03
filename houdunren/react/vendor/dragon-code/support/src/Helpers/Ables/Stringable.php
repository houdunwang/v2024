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

namespace DragonCode\Support\Helpers\Ables;

use DragonCode\Contracts\Support\Stringable as Contract;
use DragonCode\Support\Concerns\Dumpable;
use DragonCode\Support\Facades\Helpers\Arr;
use DragonCode\Support\Facades\Helpers\Str;
use DragonCode\Support\Facades\Instances\Call;

class Stringable implements Contract
{
    use Dumpable;

    public function __construct(
        protected ?string $value = null
    ) {}

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return (string) $this->value;
    }

    public function of(?string $value = null): self
    {
        $this->value = (string) $value;

        return $this;
    }

    /**
     * Performing an action on a condition.
     */
    public function when(mixed $condition, mixed $callback, mixed $default = null): self
    {
        if (Call::value($condition, $this)) {
            $value = Call::value($callback, $this);

            return new self($value);
        }

        return ! is_null($default) ? $this->when(true, $default) : $this;
    }

    /**
     * Split a string by a string.
     */
    public function explode(string $separator, ?string $map_into = null): Arrayable
    {
        $array = Arr::of(explode($separator, $this->toString()));

        return $map_into ? $array->mapInto($map_into) : $array;
    }

    /**
     * Escape HTML special characters in a string.
     */
    public function e(bool $double = true): self
    {
        return new self(Str::e($this->toString(), $double));
    }

    /**
     * Convert special HTML entities back to characters.
     */
    public function de(): self
    {
        return new self(Str::de($this->toString()));
    }

    /**
     * Replacing multiple spaces with a single space.
     */
    public function squish(): self
    {
        return new self(Str::squish($this->toString()));
    }

    /**
     * Begin a string with a single instance of a given value.
     */
    public function start(string $prefix): self
    {
        return new self(Str::start($this->toString(), $prefix));
    }

    /**
     * End a string with a single instance of a given value.
     */
    public function end(string $suffix): self
    {
        return new self(Str::end($this->toString(), $suffix));
    }

    /**
     * Adds a substring to the end of a string.
     */
    public function append(mixed $suffix): self
    {
        return new self(Str::append($this->toString(), $suffix));
    }

    /**
     * Adds a substring to the start of a string.
     */
    public function prepend(mixed $prefix): self
    {
        return new self(Str::prepend($this->toString(), $prefix));
    }

    /**
     * Cap a string with a single instance of a given value.
     */
    public function finish(string $cap = '/'): self
    {
        return new self(Str::finish($this->toString(), $cap));
    }

    /**
     * Convert the given string to lower-case.
     */
    public function lower(): self
    {
        return new self(Str::lower($this->toString()));
    }

    /**
     * Convert the given string to upper-case.
     */
    public function upper(): self
    {
        return new self(Str::upper($this->toString()));
    }

    /**
     * Convert a value to studly caps case.
     */
    public function studly(): self
    {
        return new self(Str::studly($this->toString()));
    }

    /**
     * Convert a value to camel case.
     */
    public function camel(): self
    {
        return new self(Str::camel($this->toString()));
    }

    /**
     * Convert a string to snake case.
     */
    public function snake(?string $delimiter = '_'): self
    {
        return new self(Str::snake($this->toString(), $delimiter));
    }

    /**
     * Generate a URL friendly "slug" from a given string.
     */
    public function slug(string $separator = '-', ?string $language = 'en'): self
    {
        return new self(Str::slug($this->toString(), $separator, $language));
    }

    /**
     * Convert the given string to title case.
     */
    public function title(): self
    {
        return new self(Str::title($this->toString()));
    }

    /**
     * Returns the portion of string specified by the start and length parameters.
     */
    public function substr(int $start, ?int $length = null): self
    {
        return new self(Str::substr($this->toString(), $start, $length));
    }

    /**
     * Replace all occurrences of the search string with the replacement string by format.
     */
    public function replaceFormat(array $values, ?string $key_format = null): self
    {
        return new self(Str::replaceFormat($this->toString(), $values, $key_format));
    }

    /**
     * Replace all occurrences of the search string with the replacement string.
     *
     * @param  array|string|array<string>|int|float  $search
     * @param  array|string|array<string>|int|float  $replace
     */
    public function replace(mixed $search, mixed $replace): self
    {
        return new self(Str::replace($this->toString(), $search, $replace));
    }

    /**
     * Get the portion of a string before the first occurrence of a given value.
     */
    public function before(string $search): self
    {
        return new self(Str::before($this->toString(), $search));
    }

    /**
     * Return the remainder of a string after the first occurrence of a given value.
     */
    public function after(string $search): self
    {
        return new self(Str::after($this->toString(), $search));
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     */
    public function random(int $length = 16): self
    {
        return new self(Str::random($length));
    }

    /**
     * Get the string matching the given pattern.
     */
    public function match(string $pattern): self
    {
        return new self(Str::match($this->toString(), $pattern));
    }

    /**
     * Get the all string matching the given pattern.
     */
    public function matchAll(string $pattern): Arrayable
    {
        return Arr::of(Str::matchAll($this->toString(), $pattern));
    }

    /**
     * Determine if a given string contains a given substring by regex.
     */
    public function matchContains(array|string $pattern): bool
    {
        return Str::matchContains($this->toString(), $pattern);
    }

    /**
     * Replace a given value in the string.
     */
    public function pregReplace(string $pattern, string $replacement): self
    {
        return new self(Str::pregReplace($this->toString(), $pattern, $replacement));
    }

    /**
     * Transliterate a UTF-8 value to ASCII.
     */
    public function ascii(?string $language = 'en'): self
    {
        return new self(Str::ascii($this->toString(), $language));
    }

    /**
     * Using a call-back function to process a value.
     */
    public function map(callable $callback): self
    {
        return new self(Str::map($this->toString(), $callback));
    }

    /**
     * Get the portion of a string between two given values.
     */
    public function between(mixed $from, mixed $to, bool $trim = true): self
    {
        return new self(Str::between($this->toString(), $from, $to, $trim));
    }

    /**
     * Strip whitespace (or other characters) from the beginning and end of a string.
     */
    public function trim(string $characters = " \t\n\r\0\x0B"): self
    {
        return new self(Str::trim($this->toString(), $characters));
    }

    /**
     * Strip whitespace (or other characters) from the beginning of a string.
     */
    public function ltrim(string $characters = " \t\n\r\0\x0B"): self
    {
        return new self(Str::ltrim($this->toString(), $characters));
    }

    /**
     * Strip whitespace (or other characters) from the end of a string.
     */
    public function rtrim(string $characters = " \t\n\r\0\x0B"): self
    {
        return new self(Str::rtrim($this->toString(), $characters));
    }

    /**
     * Determine if a given string matches a given pattern.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function is(array|string $pattern): bool
    {
        return Str::is($pattern, $this->toString());
    }

    /**
     * Determine if a given string starts with a given substring.
     */
    public function startsWith(mixed $needles): bool
    {
        return Str::startsWith($this->toString(), $needles);
    }

    /**
     * Determine if a given string ends with a given substring.
     */
    public function endsWith(mixed $needles): bool
    {
        return Str::endsWith($this->toString(), $needles);
    }

    /**
     * Return the length of the given string.
     *
     * @see https://github.com/illuminate/support/blob/master/Str.php
     */
    public function length(?string $encoding = null): int
    {
        return Str::length($this->toString(), $encoding);
    }

    /**
     * Count the number of substring occurrences.
     */
    public function count(string $needle, int $offset = 0): int
    {
        return Str::count($this->value, $needle, $offset);
    }

    /**
     * Determine if a given string contains a given substring.
     */
    public function contains(mixed $needles): bool
    {
        return Str::contains($this->toString(), $needles);
    }

    /**
     * Determines if the value is empty.
     */
    public function isEmpty(): bool
    {
        return Str::isEmpty($this->value);
    }

    /**
     * Determines if the value is doesn't empty.
     */
    public function doesntEmpty(): bool
    {
        return Str::doesntEmpty($this->value);
    }
}
