<?php

declare(strict_types=1);

namespace LaravelLang\Models\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;

class AllTranslationsHasBeenForgetEvent
{
    use Dispatchable;

    public function __construct(
        public Model $model
    ) {}
}
