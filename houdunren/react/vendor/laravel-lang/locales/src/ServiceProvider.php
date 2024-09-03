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

namespace LaravelLang\Locales;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LaravelLang\Locales\Concerns\About;

class ServiceProvider extends BaseServiceProvider
{
    use About;

    public function register(): void
    {
        $this->registerAbout();
    }
}
