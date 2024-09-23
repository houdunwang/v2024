<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\EmailBindController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ValidateCodeController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//登录注册
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
//密码管理
Route::post('password/find', [PasswordController::class, 'find']);
//贴子管理
Route::resource('topic', TopicController::class)->except(['create', 'edit']);
//章节
Route::resource('chapter', ChapterController::class)->except(['create', 'edit']);
//课程
Route::resource('lesson', LessonController::class)->except(['create', 'edit']);
//视频
Route::resource('video', VideoController::class)->except(['store', 'create', 'edit', 'update']);
Route::post('video/{chapter}', [VideoController::class, 'store']);
Route::put('video/{chapter}', [VideoController::class, 'update']);
//套餐
Route::resource('package', PackageController::class)->except(['create', 'edit']);
//签到
Route::resource('sign', SignController::class)->except(['create', 'edit', 'show']);
//上传
Route::post('upload/image', [UploadController::class, 'image']);
//验证码
Route::post('code/send', [ValidateCodeController::class, 'send']);
Route::post('code/send/no-exist', [ValidateCodeController::class, 'noExist']);
//邮箱
Route::post('email/bind', [EmailBindController::class, 'bind']);
