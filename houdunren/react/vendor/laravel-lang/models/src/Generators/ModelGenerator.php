<?php

declare(strict_types=1);

namespace LaravelLang\Models\Generators;

use DragonCode\Support\Facades\Filesystem\Path;
use Illuminate\Support\Str;

use function array_map;
use function dirname;
use function sprintf;

class ModelGenerator extends Generator
{
    protected string $stub = __DIR__ . '/../../stubs/model.stub';

    protected string $fillables = '\'%s\',';

    protected int $fillablePad = 8;

    protected string $casts = '\'%s\' => TrimCast::class,';

    protected int $castsPad = 8;

    protected function finish(string $path): void
    {
        require $path;
    }

    protected function data(): array
    {
        return [
            'suffix'   => $this->modelSuffix(),
            'fillable' => $this->getFillable(),
            'casts'    => $this->getCasts(),
        ];
    }

    protected function filename(): string
    {
        $directory = dirname($path = $this->path());
        $filename  = $this->getModel() . $this->modelSuffix();
        $extension = $this->extension($path);

        return $directory . '/' . $filename . '.' . $extension;
    }

    protected function getFillable(): array
    {
        return array_map(function (string $attribute) {
            return $this->pad(sprintf($this->fillables, $attribute), $this->fillablePad);
        }, $this->columns);
    }

    protected function getCasts(): array
    {
        return array_map(function (string $attribute) {
            return $this->pad(sprintf($this->casts, $attribute), $this->castsPad);
        }, $this->columns);
    }

    protected function extension(string $path): string
    {
        return Path::extension($path);
    }

    protected function pad(string $value, int $length): string
    {
        return Str::of($value)
            ->padLeft(Str::length($value) + $length, ' ')
            ->toString();
    }
}
