<?php

use Illuminate\Support\Facades\Route;

// ホームページ
Route::get('/', [\App\Http\Controllers\YanaController::class, 'showHome'])->name('showHome');
// ユーザー登録画面
Route::get('/register', [\App\Http\Controllers\UserController::class, 'showRegister'])->name('showRegister');
// ユーザー登録実行
Route::post('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('register');
// ログイン画面
Route::get('/login', [\App\Http\Controllers\UserController::class, 'showLogin'])->name('showLogin');
// ログイン実行
Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
// ユーザープロフィール画面
Route::middleware('auth')->group(function(){
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
});

// 機械学習
Route::get('/machineLearning', [App\Http\Controllers\InformationController::class, 'showMachine'])->name('machineLearning');

// 学科用エンドポイント
Route::get('/department/endpoint', [App\Http\Controllers\EndPointController::class, 'departmentEndPoint'])->name('departmentEndPoint');
// 講義用エンドポイント
Route::get('/lecture/endpoint', [App\Http\Controllers\EndPointController::class, 'lectureEndPoint'])->name('lectureEndPoint');