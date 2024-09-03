<?php

declare(strict_types=1);

namespace LaravelLang\Config\Services;

use Illuminate\Config\Repository;
use Illuminate\Support\Collection;
use LaravelLang\Config\Constants\RouteName;
use LaravelLang\Config\Data\Common\NonPushableData;
use LaravelLang\Config\Data\Common\PushableData;
use LaravelLang\Config\Data\Hidden\ModelsData as HiddenModelsData;
use LaravelLang\Config\Data\HiddenData;
use LaravelLang\Config\Data\Shared\ModelsData;
use LaravelLang\Config\Data\Shared\ModelsFilterData;
use LaravelLang\Config\Data\Shared\RouteNameData;
use LaravelLang\Config\Data\Shared\RoutesData;
use LaravelLang\Config\Data\Shared\SmartPunctuationData;
use LaravelLang\Config\Data\Shared\Translators\TranslatorChannelsData;
use LaravelLang\Config\Data\Shared\Translators\TranslatorData;
use LaravelLang\Config\Data\Shared\Translators\TranslatorOptionsData;
use LaravelLang\Config\Data\Shared\TranslatorsData;
use LaravelLang\Config\Data\SharedData;
use LaravelLang\Config\Enums\Name;
use LaravelLang\Config\Helpers\Path;

use function is_null;

class Config
{
    public function __construct(
        protected Repository $config
    ) {}

    public function shared(): SharedData
    {
        return new SharedData(
            inline     : (bool) $this->value(Name::Shared, 'inline', fallback: false),
            align      : (bool) $this->value(Name::Shared, 'align', fallback: true),
            aliases    : $this->value(Name::Shared, 'aliases', object: NonPushableData::class),
            punctuation: $this->smartPunctuation(),
            routes     : $this->routes(),
            models     : $this->models(),
            translators: $this->translators(),
        );
    }

    public function hidden(): HiddenData
    {
        return new HiddenData(
            plugins : $this->value(Name::Hidden, 'plugins', object: PushableData::class),
            packages: $this->value(Name::Hidden, 'packages', object: PushableData::class),
            map     : $this->value(Name::Hidden, 'map', object: NonPushableData::class),
            models  : $this->hiddenModels(),
        );
    }

    protected function hiddenModels(): HiddenModelsData
    {
        return new HiddenModelsData(
            directory: $this->value(Name::Hidden, 'models.directory', fallback: Path::app()),
        );
    }

    protected function smartPunctuation(): SmartPunctuationData
    {
        return new SmartPunctuationData(
            enabled: $this->value(Name::Shared, 'smart_punctuation.enable', fallback: false),
            common : $this->value(Name::Shared, 'smart_punctuation.common', fallback: []),

            locales: $this->value(
                Name::Shared,
                'smart_punctuation.locales',
                'smart_punctuation.common',
                NonPushableData::class
            ),
        );
    }

    protected function routes(): RoutesData
    {
        return new RoutesData(
            names     : new RouteNameData(
                parameter: $this->value(Name::Shared, 'routes.names.parameter', fallback: 'locale'),
                header   : $this->value(Name::Shared, 'routes.names.header', fallback: RouteName::Header),
                cookie   : $this->value(Name::Shared, 'routes.names.cookie', fallback: RouteName::Cookie),
                session  : $this->value(Name::Shared, 'routes.names.session', fallback: RouteName::Session),
                column   : $this->value(Name::Shared, 'routes.names.column', fallback: RouteName::Column),
            ),
            namePrefix: $this->value(Name::Shared, 'routes.name_prefix', fallback: 'localized.'),
            redirect  : $this->value(Name::Shared, 'routes.redirect_default', fallback: false),
        );
    }

    protected function models(): ModelsData
    {
        return new ModelsData(
            suffix : $this->value(Name::Shared, 'models.suffix', fallback: 'Translation'),
            helpers: $this->value(Name::Shared, 'models.helpers', fallback: Path::helpers()),
            filter : $this->modelsFilter(),
        );
    }

    protected function modelsFilter(): ModelsFilterData
    {
        return new ModelsFilterData(
            enabled: $this->value(Name::Shared, 'models.filter.enabled'),
        );
    }

    protected function translators(): TranslatorsData
    {
        return new TranslatorsData(
            channels: $this->translatorChannels(),
            options : $this->translatorOptions()
        );
    }

    protected function translatorChannels(): TranslatorChannelsData
    {
        $items = $this->getTranslators();

        return new TranslatorChannelsData($items, array_filter($items, fn (TranslatorData $item) => $item->enabled));
    }

    protected function translatorOptions(): TranslatorOptionsData
    {
        return new TranslatorOptionsData(
            preserveParameters: $this->value(
                Name::Shared,
                'translators.options.preserve_parameters',
                fallback: true
            )
        );
    }

    protected function getTranslators(): array
    {
        return (new Collection($this->value(Name::Shared, 'translators.channels')))->map(
            fn (array $item) => new TranslatorData(
                enabled    : $item['enabled'] ?? true,
                translator : $item['translator'],
                credentials: $item['credentials'] ?? [],
                priority   : $item['priority']    ?? 0
            )
        )->sortBy(fn (TranslatorData $item) => $item->priority)->all();
    }

    protected function value(
        Name $name,
        string $key,
        ?string $default = null,
        ?string $object = null,
        mixed $fallback = null
    ): mixed {
        $main    = $name->value . '.' . $key;
        $default = $default ? $name->value . '.' . $default : null;

        if (is_null($object)) {
            return $this->repository($main, $this->repository($default)) ?? $fallback;
        }

        return new $object($main, $default);
    }

    protected function repository(?string $key, ?string $default = null): mixed
    {
        if (is_null($key)) {
            return null;
        }

        if (! is_null($default)) {
            $default = $this->repository($default);
        }

        return $this->config->get($key, $default);
    }
}
