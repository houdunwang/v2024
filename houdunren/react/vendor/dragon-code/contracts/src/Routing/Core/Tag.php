<?php

/*
 * This file is part of the "dragon-code/contracts" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@ai-rus.com>
 *
 * @copyright 2021 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/TheDragonCode/contracts
 */

declare(strict_types=1);

namespace DragonCode\Contracts\Routing\Core;

use Illuminate\Contracts\Support\Arrayable;
use phpDocumentor\Reflection\DocBlock\Tag as DocTag;

interface Tag extends Arrayable
{
    public function getCode(): int;

    public function setCode(): void;

    public function getClass(): string;

    public function setClass(DocTag $tag): void;

    public function getDescription(): ?string;

    public function setDescription(DocTag $tag): void;

    public function setSources(array $items): self;
}
