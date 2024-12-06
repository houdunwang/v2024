<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => 'ok');
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::resource('lesson', LessonController::class)->except(['create', 'edit']);
Route::resource('chapter', ChapterController::class)->except(['create', 'edit']);
Route::resource('video', VideoController::class)->except(['create', 'edit', 'store', 'update']);
Route::resource('topic', TopicController::class)->except(['create', 'edit']);
Route::resource('sign', SignController::class)->except(['create', 'edit', 'update', 'show']);
