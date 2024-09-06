<?php

//获取章节列表
test('GetChapterList', function () {
    $response = $this->getJson('/chapter');
    $response->assertStatus(200)->assertjsonStructure(['data', 'meta']);
});
