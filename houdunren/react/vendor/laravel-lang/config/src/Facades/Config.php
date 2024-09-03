<?php

declare(strict_types=1);

namespace LaravelLang\Config\Facades;

use Illuminate\Support\Facades\Facade;
use LaravelLang\Config\Data\HiddenData;
use LaravelLang\Config\Data\SharedData;
use LaravelLang\Config\Services\Config as ConfigService;

/**
 * @method static HiddenData hidden()
 * @method static SharedData shared()
 */
class Config extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ConfigService::class;
    }
}
