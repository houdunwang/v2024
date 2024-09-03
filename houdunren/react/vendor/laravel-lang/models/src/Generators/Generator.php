<?php

declare(strict_types=1);

namespace LaravelLang\Models\Generators;

use DragonCode\Support\Facades\Filesystem\File;
use DragonCode\Support\Facades\Helpers\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str as IS;
use LaravelLang\Config\Facades\Config;
use LaravelLang\Models\Eloquent\Translation;
use LaravelLang\Models\Exceptions\UnknownModelPathException;
use LaravelLang\Models\Services\ClassMap;

use function collect;
use function file_get_contents;
use function implode;
use function is_array;
use function ltrim;

abstract class Generator
{
    protected string $stub;

    protected array $registry = [];

    abstract protected function data(): array;

    abstract protected function filename(): string;

    public function __construct(
        protected string $model,
        protected array $columns
    ) {}

    public static function of(string $model, array $columns = []): static
    {
        return new static($model, $columns);
    }

    public function generate(): void
    {
        if ($filename = $this->filename()) {
            $this->store($filename, $this->make());
            $this->finish($filename);
        }
    }

    protected function make(): string
    {
        return Str::of($this->template())
            ->replaceFormat($this->resolveData(), '{{%s}}')
            ->toString();
    }

    protected function finish(string $path): void {}

    protected function baseData(): array
    {
        return [
            'fqn'       => $this->getFqn(),
            'namespace' => $this->getNamespace(),
            'model'     => $this->getModel(),
        ];
    }

    protected function resolveData(): array
    {
        return collect($this->data())
            ->map(fn (mixed $value) => is_array($value) ? implode(PHP_EOL, $value) : $value)
            ->merge($this->baseData())
            ->all();
    }

    protected function store(string $path, string $content): void
    {
        File::store($path, $content);
    }

    protected function getFqn(): string
    {
        return ltrim($this->model, '\\');
    }

    protected function getNamespace(): string
    {
        return IS::of($this->model)
            ->ltrim('\\')
            ->beforeLast('\\')
            ->toString();
    }

    protected function getModel(): string
    {
        return IS::afterLast($this->model, '\\');
    }

    protected function baseModel(): Model
    {
        return $this->registry[$this->model] ??= new $this->model();
    }

    protected function translationModel(): Translation
    {
        $model = $this->translationModelNamespace();

        return $this->registry[$model] ??= new $model();
    }

    protected function translationModelNamespace(): string
    {
        return $this->model . $this->modelSuffix();
    }

    protected function modelSuffix(): string
    {
        return Config::shared()->models->suffix;
    }

    protected function template(): string
    {
        return file_get_contents($this->stub);
    }

    protected function path(): string
    {
        if ($path = ClassMap::path($this->model)) {
            return $path;
        }

        throw new UnknownModelPathException($this->model);
    }
}
