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

namespace LaravelLang\Locales\Enums;

/**
 * @deprecated Use the \LaravelLang\LocaleList\Direction instead
 */
enum Direction: string
{
    case LeftToRight = 'ltr';
    case RightToLeft = 'rtl';
}
