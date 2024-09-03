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

use ArchTech\Enums\InvokableCases;

/**
 * @deprecated Use \LaravelLang\Config\Enums\Name instead
 *
 * @method static string PublicKey()
 * @method static string PrivateKey()
 */
enum Config: string
{
    use InvokableCases;

    case PublicKey  = 'localization';
    case PrivateKey = 'localization-private';
}
