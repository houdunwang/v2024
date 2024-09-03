<?php

/**
 * This file is part of the "dragon-code/json-fallback" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2024 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/json-fallback
 */

declare(strict_types=1);

namespace LaravelLang\JsonFallback;

use Illuminate\Translation\TranslationServiceProvider as BaseServiceProvider;

class TranslationServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->registerLoader();

        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];

            $locale = $app['config']['app.locale'];

            $trans = new Translator($loader, $locale);

            $trans->setFallback($app['config']['app.fallback_locale']);

            return $trans;
        });
    }
}
