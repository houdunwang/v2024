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

use DragonCode\Contracts\Cashier\Config\Queues\Names;
use DragonCode\Contracts\Cashier\Config\Queues\Unique;

interface Queue
{
    public function getConnection(): ?string;

    public function getNames(): Names;

    public function afterCommit(): bool;

    public function getTries(): int;

    public function getUnique(): Unique;
}
