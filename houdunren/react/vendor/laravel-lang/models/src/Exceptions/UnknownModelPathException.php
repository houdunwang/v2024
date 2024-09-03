<?php

declare(strict_types=1);

namespace LaravelLang\Models\Exceptions;

use RuntimeException;

class UnknownModelPathException extends RuntimeException
{
    public function __construct(string $model)
    {
        parent::__construct("Could not find path to model file `$model`.");
    }
}
