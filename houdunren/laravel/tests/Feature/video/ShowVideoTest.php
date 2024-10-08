<?php

use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Order;
use App\Models\User;
use App\Models\Video;

function getVideo()
{
    $order = Order::factory()->forUser()->for(
        Chapter::factory()->has(Lesson::factory()->hasVideos(1, function ($attrs, $lesson) {
            return ['chapter_id' => $lesson->chapter_id];
        }))
    )->create();
    return $order->chapter->lessons->first()->videos->first();
}
//未登录用户不允许查看视频
test('UsersWhoAreNotLoggedInAreNotAllowedToViewTheVideo', function () {
    $lesson = Lesson::factory()->forChapter()->create();
    $video = Video::factory()->for($lesson)->create([
        'chapter_id' => $lesson->chapter_id
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
    $response = $this->actingAs($video->lesson->chapter->orders->first()->user)
        ->getJson('/video/' . $video->id);
    $response->assertStatus(200)->assertJsonPath('data.id', $video->id);
});
