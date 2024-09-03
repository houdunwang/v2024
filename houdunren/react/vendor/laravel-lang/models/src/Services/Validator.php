<?php

declare(strict_types=1);

namespace LaravelLang\Models\Services;

use Illuminate\Database\Eloquent\Model;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Locales\Data\LocaleData;
use LaravelLang\Locales\Facades\Locales;
use LaravelLang\Models\Exceptions\AttributeIsNotTranslatableException;
use LaravelLang\Models\Exceptions\UnavailableLocaleException;

class Validator
{
    /**
     * @param  Attribute|\LaravelLang\Models\HasTranslations  $model
     *
     * @throws AttributeIsNotTranslatableException
     */
    public static function column(Model $model, string $column): string
    {
        if (! $model->isTranslatable($column)) {
            throw new AttributeIsNotTranslatableException($column, $model);
        }

        return $column;
    }

    public static function locale(Locale|LocaleData|string|null $locale): ?LocaleData
    {
        if ($locale && ! Locales::isInstalled($locale)) {
            throw new UnavailableLocaleException($locale->code ?? null);
        }

        return null;
    }
}
