<?php

/**
 * This file is part of the "laravel-lang/locales" project.
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

namespace LaravelLang\Locales\Services;

use LaravelLang\LocaleList\Locale;
use LaravelLang\Locales\Data\LocaleData;
use stdClass;

class Resolver
{
    public static function fromMixed(mixed $locale): ?string
    {
        if ($locale instanceof LocaleData) {
            return $locale->code;
        }

        if ($locale instanceof Locale) {
            return $locale->value;
        }

        if (is_object($locale) || is_array($locale) || $locale instanceof stdClass) {
            return null;
        }

        return static::toString((string) $locale);
    }

    public static function toString(Locale|LocaleData|string|null $locale): ?string
    {
        if ($locale instanceof LocaleData) {
            return $locale->locale->value;
        }

        return $locale?->value ?? $locale;
    }
}
