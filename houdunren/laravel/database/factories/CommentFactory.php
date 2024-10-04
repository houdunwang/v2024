<?php

namespace Database\Factories;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            "content" => fake()->sentence(),
            "commentable_type" => Topic::class,
            'commentable_id' => Topic::inRandomOrder()->first()->id,
        ];
    }
}
