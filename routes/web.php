<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('user/signin');
});

Route::get('/test', function () {
    return view('test');
});

