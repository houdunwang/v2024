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

namespace DragonCode\Contracts\Cashier\Resources;

use DragonCode\Contracts\DataTransferObject\DataTransferObject;
use DragonCode\Contracts\Support\Jsonable;

/** @method static make(array $details = []) */
interface Details extends DataTransferObject, Jsonable
{
    public function getStatus(): ?string;
}
