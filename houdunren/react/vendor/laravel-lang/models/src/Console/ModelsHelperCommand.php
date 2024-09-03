<?php

declare(strict_types=1);

namespace LaravelLang\Models\Console;

use DragonCode\Support\Facades\Filesystem\Directory;
use Illuminate\Console\Command;
use LaravelLang\Config\Facades\Config;
use LaravelLang\Models\Generators\HelperGenerator;
use LaravelLang\Models\Services\ClassMap;
use Symfony\Component\Console\Attribute\AsCommand;

use function ltrim;

#[AsCommand(name: 'lang:models-helper')]
class ModelsHelperCommand extends Command
{
    protected $signature = 'lang:models-helper {model?}';

    protected $description = 'Generating autocomplete translatable properties for models';

    public function handle(): void
    {
        $this->cleanUp();
        $this->process();
    }

    protected function process(): void
    {
        foreach ($this->models() as $model) {
            $this->components->task($model, fn () => $this->generate($model));
        }
    }

    protected function generate(string $model): void
    {
        HelperGenerator::of($model)->generate();
    }

    protected function models(): array
    {
        if ($model = $this->argument('model')) {
            return [ltrim($model, '\\')];
        }

        return ClassMap::translatable();
    }

    protected function cleanUp(): void
    {
        Directory::ensureDelete(
            Config::shared()->models->helpers
        );
    }
}
