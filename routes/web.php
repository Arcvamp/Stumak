<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/signup', [RegisterController::class , 'create']);
Route::post('user/signup', [RegisterController::class , 'store']);
