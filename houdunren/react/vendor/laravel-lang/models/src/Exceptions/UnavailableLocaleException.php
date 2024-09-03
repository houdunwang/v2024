<?php

declare(strict_types=1);

namespace LaravelLang\Models\Exceptions;

use Exception;
use LaravelLang\Locales\Facades\Locales;

use function sprintf;

class UnavailableLocaleException extends Exception
{
    public function __construct(?string $locale)
    {
        parent::__construct(
            sprintf(
                'Cannot set translation for `%s` locale as it\'s not on of the installed locales: `%s`.',
                $locale,
                $this->available()
            )
        );
    }

    protected function available(): string
    {
        return Locales::installed()->pluck('code')->filter()->implode(', ');
    }
}
