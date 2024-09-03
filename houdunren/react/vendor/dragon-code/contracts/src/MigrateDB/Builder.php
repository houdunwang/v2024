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

namespace DragonCode\Contracts\MigrateDB;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder as SchemaBuilder;

interface Builder
{
    public function __construct(Connection $connection);

    /**
     * @return \Illuminate\Database\Schema\Builder|\Illuminate\Database\Schema\MySqlBuilder|\Illuminate\Database\Schema\PostgresBuilder
     */
    public function schema(): SchemaBuilder;

    public function getPrimaryKey(string $table): string;

    public function getAllTables(): array;

    public function dropAllTables(): void;

    public function disableForeign(): void;

    public function enableForeign(): void;
}
