<?php

declare(strict_types=1);

namespace LaravelLang\Models\Generators;

use Illuminate\Support\Str;
use LaravelLang\Models\HasTranslations;

class ParentGenerator extends Generator
{
    protected ?string $template = null;

    protected function make(): string
    {
        return $this->wasAttached()
            ? $this->template()
            : $this->attach();
    }

    protected function filename(): string
    {
        return $this->path();
    }

    protected function template(): string
    {
        return $this->template ??= \file_get_contents($this->path());
    }

    protected function data(): array
    {
        return [];
    }

    protected function attach(): string
    {
        return Str::of($this->template())
            ->replaceMatches('/(namespace\s+.+;\r?\n?)/', '$1' . PHP_EOL . 'use ' . HasTranslations::class . ';')
            ->replaceMatches('/(class\s+.+\r?\n?\s*\{\r?\n?)/', '$1    use HasTranslations;' . PHP_EOL)
            ->toString();
    }

    protected function wasAttached(): bool
    {
        return Str::contains($this->template(), HasTranslations::class, true);
    }
}
