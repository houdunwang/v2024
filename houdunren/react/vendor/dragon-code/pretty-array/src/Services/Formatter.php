<?php

/*
 * This file is part of the "dragon-code/pretty-array" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2023 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/pretty-array
 */

namespace DragonCode\PrettyArray\Services;

use DragonCode\Contracts\Pretty\Arr\Caseable;
use DragonCode\PrettyArray\Concerns\HasCases;
use DragonCode\PrettyArray\Services\Formatters\Json;
use DragonCode\PrettyArray\Services\Formatters\Php;
use DragonCode\Support\Concerns\Makeable;

class Formatter implements Caseable
{
    use Makeable;
    use HasCases;

    protected bool $key_as_string = false;

    protected bool $equals_align = false;

    protected bool $is_simple = false;

    protected bool $as_json = false;

    public function setKeyAsString(): void
    {
        $this->key_as_string = true;
    }

    public function setEqualsAlign(): void
    {
        $this->equals_align = true;
    }

    public function setSimple(): void
    {
        $this->is_simple = true;
    }

    public function asJson(bool $json = true): void
    {
        $this->as_json = $json;
    }

    public function raw(array $array, int $pad = 1): string
    {
        if ($this->as_json) {
            return Json::make()
                ->setCase($this->case)
                ->setKeyAsString($this->key_as_string)
                ->setSimple($this->is_simple)
                ->get($array, $pad);
        }

        return Php::make()
            ->setCase($this->case)
            ->setKeyAsString($this->key_as_string)
            ->setSimple($this->is_simple)
            ->setEqualsAlign($this->equals_align)
            ->get($array, $pad);
    }
}
