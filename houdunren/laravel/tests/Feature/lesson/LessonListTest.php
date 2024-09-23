<?php

//获取课程列表
test('GetLessonList', function () {
    $response = $this->getJson('/lesson');
    $response->assertStatus(200)->assertjsonStructure(['data', 'meta']);
});
