<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('signup', [RegisterController::class , 'create'])->middleware('guest');
Route::post('signup', [RegisterController::class , 'store'])->middleware('guest');

Route::get('signin', [LoginController::class , 'create'])->name('login')->middleware('guest');
Route::post('signin', [LoginController::class , 'store'])->middleware('guest');

