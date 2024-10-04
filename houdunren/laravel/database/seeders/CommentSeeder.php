<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::factory()->count(10)->create();
        $comment = Comment::find(1);
        $comment->commentable_id = 1;
        $comment->user_id = 1;
        $comment->save();

        $comment2 = Comment::find(2);
        $comment2->comment_id = 1;
        $comment2->user_id = 2;
        $comment2->reply_user_id = 1;
        $comment2->save();
    }
}
