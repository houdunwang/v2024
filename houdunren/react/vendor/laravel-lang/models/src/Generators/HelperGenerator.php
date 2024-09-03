<?php

declare(strict_types=1);

namespace LaravelLang\Models\Generators;

use Illuminate\Support\Str;
use LaravelLang\Config\Facades\Config;

use function array_map;
use function md5;
use function sprintf;

class HelperGenerator extends Generator
{
    protected string $stub = __DIR__ . '/../../stubs/helper.stub';

    protected string $properties = '     * @property string|null $%s';

    protected function data(): array
    {
        return [
            'hash'       => $this->getHash(),
            'properties' => $this->getProperties(),

            'translationNamespace' => $this->translationModelNamespace(),
            'translationModel'     => $this->getTranslationModel(),
        ];
    }

    protected function filename(): string
    {
        return Config::shared()->models->helpers . '/_ide_helper_models_' . $this->getHash() . '.php';
    }

    protected function getProperties(): array
    {
        return array_map(fn (string $attribute) => sprintf($this->properties, $attribute), $this->getTranslatable());
    }

    protected function getHash(): string
    {
        return md5($this->model);
    }

    protected function getTranslatable(): array
    {
        return $this->translationModel()->translatable();
    }

    protected function getTranslationModel(): string
    {
        return Str::afterLast($this->translationModelNamespace(), '\\');
    }
}
