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

namespace DragonCode\Support\Callbacks;

use DragonCode\Support\Facades\Helpers\Str;

class Sorter
{
    /**
     * Gets an array of special characters.
     *
     * @return array<string>
     */
    public function specialChars(): array
    {
        return [
            ' ',
            '*',
            '-',
            '_',
            '—',
            '=',
            '\\',
            '/',
            '|',
            '~',
            '`',
            '+',
            ':',
            ';',
            '@',
            '#',
            '$',
            '%',
            '^',
            '&',
            '?',
            '!',
            '(',
            ')',
            '{',
            '}',
            '[',
            ']',
            '§',
            '№',
            '<',
            '>',
            '.',
            ',',
        ];
    }

    /**
     * Gets a callback function for sorting.
     */
    public function default(): callable
    {
        return function ($current, $next) {
            $current = $this->lower($current);
            $next    = $this->lower($next);

            if ($current === $next) {
                return 0;
            }

            if (is_string($current) && is_numeric($next)) {
                return $this->hasSpecialChar($current) ? -1 : 1;
            }

            if (is_numeric($current) && is_string($next)) {
                return $this->hasSpecialChar($next) ? 1 : -1;
            }

            return $current < $next ? -1 : 1;
        };
    }

    /**
     * Prepares a value for case-insensitive sorting.
     *
     * @return mixed|string|null
     */
    protected function lower($value): mixed
    {
        return is_string($value) ? Str::lower($value) : $value;
    }

    /**
     * Determine if a value is a special character.
     */
    protected function hasSpecialChar($value): bool
    {
        return in_array($value, $this->specialChars());
    }
}
