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

namespace DragonCode\Contracts\Cashier\Config;

use DragonCode\Contracts\Cashier\Config\Payments\Attributes;
use DragonCode\Contracts\Cashier\Config\Payments\Map;
use DragonCode\Contracts\Cashier\Config\Payments\Statuses;

interface Payment
{
    public function getModel(): string;

    public function getAttributes(): Attributes;

    public function getStatuses(): Statuses;

    public function getMap(): Map;
}
