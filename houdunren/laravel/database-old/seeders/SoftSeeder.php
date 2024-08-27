<?php

namespace Database\Seeders;

use App\Models\Soft;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $softs = Soft::factory(4)->create();
        $softs[0]->name = 'camera';
        $softs[0]->save();
    }
}
