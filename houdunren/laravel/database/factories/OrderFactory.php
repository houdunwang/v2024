<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sn' => 'SN-' . fake()->unique()->randomNumber(8),
            'subject' => fake()->sentence(),
            'price' => fake()->randomNumber(3, true),
            'pay_state' => true,
            'pay_type' => 'wechat',
            'trade_no' => 'SN-' . fake()->unique()->randomNumber(8),
            // 'user_id' => User::inRandomOrder()->first()->id,
            // 'chapter_id' => Chapter::inRandomOrder()->first()->id,
        ];
    }
}
