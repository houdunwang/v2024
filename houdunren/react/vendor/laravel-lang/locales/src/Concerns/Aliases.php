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

namespace LaravelLang\Locales\Concerns;

use LaravelLang\Config\Facades\Config;
use LaravelLang\LocaleList\Locale as LocaleCode;
use LaravelLang\Locales\Data\LocaleData;

trait Aliases
{
    protected function fromAlias(LocaleCode|LocaleData|string|null $locale): ?string
    {
        if ($locale = $this->stringify($locale)) {
            return collect($this->aliases())->flip()->get($locale, $locale);
        }

        return null;
    }

    protected function toAlias(LocaleCode|LocaleData|string|null $locale): ?string
    {
        if ($locale = $this->stringify($locale)) {
            return collect($this->aliases())->get($locale, $locale);
        }

        return null;
    }

    protected function aliases(): array
    {
        return Config::shared()->aliases->all();
    }

    protected function stringify(LocaleCode|LocaleData|string|null $locale): ?string
    {
        return match (true) {
            $locale instanceof LocaleData => $locale->code,
            $locale instanceof LocaleCode => $locale->value,
            default                       => $locale
        };
    }
}
