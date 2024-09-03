<?php

declare(strict_types=1);

namespace LaravelLang\Models\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use LaravelLang\Config\Facades\Config;
use LaravelLang\Models\Generators\MigrationGenerator;
use LaravelLang\Models\Generators\ModelGenerator;
use LaravelLang\Models\Generators\ParentGenerator;
use LaravelLang\Models\Services\ClassMap;
use Symfony\Component\Console\Attribute\AsCommand;

use function array_filter;
use function array_merge;
use function class_exists;
use function compact;
use function Laravel\Prompts\error;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

#[AsCommand(name: 'make:model-translation')]
class ModelMakeCommand extends Command
{
    protected $signature = 'make:model-translation {model?} {--columns=*}';

    protected $description = 'Creates a model for storing translations';

    protected array $columns = ['locale', 'title', 'description'];

    public function handle(): void
    {
        $model = $this->model();

        if (! $this->validatedModel($model)) {
            error("The model at `$model` namespace was not found.");

            return;
        }

        if ($this->hasTranslation($model)) {
            warning('The specified model already has a translation repository.');

            return;
        }

        $columns = $this->columns();

        $this->attachToParent($model);
        $this->generateModel($model, $columns);
        $this->generateMigration($model, $columns);
        $this->generateHelper($model);
    }

    protected function generateModel(string $model, array $columns): void
    {
        ModelGenerator::of($model, $columns)->generate();
    }

    protected function generateMigration(string $model, array $columns): void
    {
        MigrationGenerator::of($model, $columns)->generate();
    }

    protected function attachToParent(string $model): void
    {
        ParentGenerator::of($model)->generate();
    }

    protected function generateHelper(string $model): void
    {
        $this->call(ModelsHelperCommand::class, compact('model'));
    }

    protected function model(): ?string
    {
        if ($class = $this->askModel()) {
            return Str::start($class, '\\');
        }

        return null;
    }

    protected function askModel(): ?string
    {
        if ($model = $this->argument('model')) {
            return $model;
        }

        return select(
            label  : 'Select a model to create a translation repository:',
            options: $this->models()
        );
    }

    protected function validatedModel(string $model): ?string
    {
        return class_exists($model) ? $model : null;
    }

    protected function hasTranslation(string $model): bool
    {
        return class_exists($model . Config::shared()->models->suffix);
    }

    protected function columns(): array
    {
        if ($columns = $this->option('columns')) {
            return $columns;
        }

        if ($columns = $this->askColumns()) {
            return $columns;
        }

        return $this->columns;
    }

    protected function models(): array
    {
        return ClassMap::available();
    }

    protected function askColumns(array $columns = []): array
    {
        if ($column = text('Enter a column name or press Enter for continue')) {
            return array_filter(array_merge([$column], $this->askColumns($columns)));
        }

        return [];
    }
}
