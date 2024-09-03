<?php

declare(strict_types=1);

namespace LaravelLang\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use LaravelLang\Models\Services\Relation;

use function array_merge;
use function array_unique;

trait ModelLoader
{
    public static function bootModelLoader(): void
    {
        static::saved(function (Model $model) {
            Relation::resolveKey($model);

            $model->translations?->each?->save();
        });
    }

    public function initializeModelLoader(): void
    {
        $this->with = array_unique(array_merge($this->with, ['translations']));
    }
}
