<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)
            ->hasTopics()
            ->hasSigns()
            ->has(Order::factory()->count(5)->for(Chapter::factory()))
            ->create();

        $user = User::find(1);
        $user->name = 'admin';
        $user->email = '2300071698@qq.com';
        $user->save();
    }
}
