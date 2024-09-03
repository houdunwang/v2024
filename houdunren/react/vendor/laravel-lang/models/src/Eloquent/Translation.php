<?php

declare(strict_types=1);

namespace LaravelLang\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

use function array_filter;
use function strtolower;

abstract class Translation extends Model
{
    public $timestamps = false;

    public function translatable(): array
    {
        return array_filter($this->getFillable(), fn (string $column) => strtolower($column) !== 'locale');
    }

    protected function casts(): array
    {
        return $this->casts;
    }
}
