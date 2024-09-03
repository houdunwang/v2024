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

namespace DragonCode\Contracts\Cashier\Http;

use DragonCode\Contracts\DataTransferObject\DataTransferObject;

/** @method static Response make(array $items = []) */
interface Response extends DataTransferObject
{
    public function getExternalId(): ?string;

    public function getOperationId(): ?string;

    public function getStatus(): ?string;

    public function isEmpty(): bool;
}
