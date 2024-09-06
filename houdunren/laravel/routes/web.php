<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//登录注册
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);

//贴子管理
Route::resource('topic', TopicController::class)->except(['create', 'edit']);

//章节
Route::resource('chapter', ChapterController::class)->except(['create', 'edit']);
