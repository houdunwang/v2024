<?php

declare(strict_types=1);

namespace LaravelLang\Config\Enums;

use ArchTech\Enums\InvokableCases;

/**
 * @method static string Shared()
 * @method static string Hidden()
 */
enum Name: string
{
    use InvokableCases;

    case Shared = 'localization';
    case Hidden = 'localization-private';
}
