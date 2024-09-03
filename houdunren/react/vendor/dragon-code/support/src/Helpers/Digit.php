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

use DragonCode\Support\Facades\Helpers\Arr;
use DragonCode\Support\Facades\Helpers\Str as StrHelper;

class Digit
{
    /**
     * Calculating the factorial of a number.
     */
    public function factorial(int $n = 0): int
    {
        if ($n === 0) {
            return 1;
        }

        return $n * $this->factorial($n - 1);
    }

    /**
     * Converts a number into a short version.
     * eg: 1000 >> 1K.
     */
    public function toShort(float $number, int $precision = 1, ?string $suffix = null): string
    {
        $length = strlen((string) ((int) $number));
        $length = ceil($length / 3) * 3 + 1;

        $suffix = $this->suffix($length, $suffix);
        $value  = $this->rounded($number, $length, $precision);

        return $value . $suffix;
    }

    /**
     * Create short unique identifier from number.
     * Actually using in short URL.
     */
    public function toChars(int $number, string $chars = 'abcdefghijklmnopqrstuvwxyz'): string
    {
        $length = StrHelper::length($chars);

        $mod = $number % $length;

        while ($mod > 0 || $number > 0) {
            $result = StrHelper::of($chars)->substr($mod, 1)->append($result ?? '');

            $number = ($number - $mod) / $length;

            $mod = $number % $length;
        }

        return $result ?? StrHelper::substr($chars, $number, 1);
    }

    /**
     * Format a number with grouped with divider.
     */
    public function rounded(float|int $number, int $length = 4, int $precision = 1): float
    {
        $divided = (float) bcpow(10, $length - 4, 2);

        return round($number / $divided, $precision);
    }

    /**
     * Converts a numeric value to a string.
     */
    public function toString(float|int $value): string
    {
        return (string) $value;
    }

    protected function suffix(int $length = 0, ?string $suffix = null): string
    {
        $available = [
            4  => '' . $suffix,
            7  => 'K' . $suffix,
            10 => 'M' . $suffix,
            13 => 'B' . $suffix,
            16 => 'T' . $suffix . '+',
        ];

        return $available[$length] ?? Arr::last($available);
    }
}
