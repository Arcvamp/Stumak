<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('signup', [RegisterController::class, 'index'])->middleware('guest')->name('signup');
Route::get('vendor/register', [RegisterController::class, 'index'])->middleware('guest')->name('vendor.register');
Route::post('signup', [RegisterController::class, 'store'])->middleware('guest');

Route::get('signin', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('signin', [LoginController::class, 'store'])->middleware('guest');

Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/protected-route', function () {
        return 'This is a protected route!';
    });
});
