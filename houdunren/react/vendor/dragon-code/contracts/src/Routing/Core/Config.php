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

interface Config
{
    public function getApiMiddleware(): array;

    public function getWebMiddleware(): array;

    public function getHideMethods(): array;

    public function getHideMatching(): array;

    public function getDomainForce(): bool;

    public function getUrl(): ?string;

    public function getNamespace(): ?string;
}
