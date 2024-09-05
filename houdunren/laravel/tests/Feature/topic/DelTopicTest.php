<?php

use App\Models\Topic;
use App\Models\User;

//游客不能删除贴子
test('VisitorsAreNotAllowedToDeletePosts', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->deleteJson('/topic/' . $topic->id);
    $response->assertUnauthorized();
});

//不能删除别的人贴子
test('UsersAreNotAllowedToDeleteOthersPosts', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::factory()->create())->deleteJson('/topic/' . $topic->id);
    $response->assertForbidden();
});

//超级管理员可以删除任何人的贴子
test('AdminCanDeleteAnyPosts', function () {
    $topic = Topic::factory()->forUser()->create();
    $response = $this->actingAs(User::find(1))->deleteJson('/topic/' . $topic->id);
    $response->assertNoContent();
});
