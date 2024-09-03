<?php

declare(strict_types=1);

namespace LaravelLang\Models\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\Model;

use function implode;
use function sprintf;

class AttributeIsNotTranslatableException extends Exception
{
    public function __construct(string $column, Model $model)
    {
        parent::__construct(
            sprintf(
                'Cannot translate attribute `%s` as it\'s not on of the translatable attributes: `%s`.',
                $column,
                $this->available($model)
            )
        );
    }

    protected function available(Model $model): string
    {
        return implode(', ', $model->translatable());
    }
}
