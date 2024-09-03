<?php

declare(strict_types=1);

namespace LaravelLang\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use LaravelLang\LocaleList\Locale;
use LaravelLang\Locales\Data\LocaleData;
use LaravelLang\Locales\Facades\Locales;
use LaravelLang\Models\Concerns\HasNames;
use LaravelLang\Models\Concerns\ModelLoader;
use LaravelLang\Models\Eloquent\Scopes\FilterTranslationsScope;
use LaravelLang\Models\Eloquent\Translation;
use LaravelLang\Models\Services\Attribute;
use LaravelLang\Models\Services\Registry;
use LaravelLang\Models\Services\Relation;

use function app;
use function in_array;
use function is_iterable;

/**
 * @mixin \Illuminate\Database\Eloquent\Concerns\HasAttributes
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasTranslations
{
    use ModelLoader;
    use HasNames;

    public function translations(): HasMany
    {
        return $this->hasMany($this->translationModelName(), 'item_id')
            ->tap(new FilterTranslationsScope());
    }

    public function hasTranslated(string $column, Locale|LocaleData|string|null $locale = null): bool
    {
        return Attribute::of($this, $column, $locale)
            ->validate()
            ->has();
    }

    public function setTranslation(string $column, mixed $value, Locale|LocaleData|string|null $locale = null): Model
    {
        return Attribute::of($this, $column, $locale)
            ->validate()
            ->set($value);
    }

    public function setTranslations(string $column, iterable $values): static
    {
        foreach ($values as $locale => $value) {
            $this->setTranslation($column, $value, $locale);
        }

        return $this;
    }

    public function getTranslation(string $column, Locale|LocaleData|string|null $locale = null): mixed
    {
        return Attribute::of($this, $column, $locale)
            ->validate()
            ->get();
    }

    public function isTranslatable(string $column): bool
    {
        return in_array($column, $this->translatable(), true);
    }

    public function forgetTranslation(Locale|LocaleData|string $locale): Model
    {
        return Attribute::of($this, locale: $locale)
            ->validateLocale()
            ->forget();
    }

    public function forgetAllTranslations(): Model
    {
        return Attribute::of($this)->forgetAll();
    }

    public function getAttribute($key): mixed
    {
        if ($this->isTranslatable($key)) {
            return $this->getTranslation($key);
        }

        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value): Model
    {
        if ($this->isTranslatable($key)) {
            return $this->setTranslation($key, $value);
        }

        return parent::setAttribute($key, $value);
    }

    public function setRelation($relation, $value): static
    {
        $this->relations[$relation] = match ($relation) {
            'translations' => $value->keyBy('locale'),
            default        => $value
        };

        return $this;
    }

    public function newInstance($attributes = [], $exists = false): static
    {
        $basic        = Arr::except($attributes, $this->translatable());
        $translatable = Arr::only($attributes, $this->translatable());

        $model = parent::newInstance($basic, $exists);

        foreach ($translatable as $key => $value) {
            is_iterable($value)
                ? $model->setTranslations($key, $value)
                : $model->setTranslation($key, $value);
        }

        return $model;
    }

    public function translatable(): array
    {
        return app(Registry::class)->get(__METHOD__, function () {
            return (new ($this->translationModelName())())->translatable();
        });
    }

    public function translation(?LocaleData $locale): Translation
    {
        $locale ??= Locales::getCurrent();

        if (! $this->translations->has($locale->locale->value)) {
            $this->translations->put($locale->locale->value, Relation::initializeLocale($this, $locale));
        }

        return $this->translations->get($locale->locale->value);
    }
}
