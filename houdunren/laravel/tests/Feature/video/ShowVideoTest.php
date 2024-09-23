<?php

use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Order;
use App\Models\User;
use App\Models\Video;

function getVideo()
{
    $order = Order::factory()->forUser()->for(
        Lesson::factory()->has(Chapter::factory()->has(Video::factory()->state(function ($attribute, $chapter) {
            return ['lesson_id' => $chapter->lesson_id];
        })))
    )->create();
    return $order->lesson->chapters->first()->videos->first();
}
//未登录用户不允许查看视频
test('UsersWhoAreNotLoggedInAreNotAllowedToViewTheVideo', function () {
    $chapter = Chapter::factory()->forLesson()->create();
    $video = Video::factory()->for($chapter)->create([
        'lesson_id' => $chapter->lesson_id
    ]);
    $response = $this->getJson('/video/' . $video->id);
    $response->assertStatus(401);
});

//没有购买项目的用户不允许查看视频
test('UsersWhoHaveNotPurchasedTheItemAreNotAllowedToViewTheVideo', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->getJson('/video/' . getVideo()->id);
    $response->assertStatus(403);
});


//购买项目的用户可以查看视频
test('UsersWhoHavePurchasedTheItemCanViewTheVideo', function () {
    $video = getVideo();
    $response = $this->actingAs($video->chapter->lesson->orders->first()->user)
        ->getJson('/video/' . $video->id);
    $response->assertStatus(200)->assertJsonPath('data.id', $video->id);
});
