<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('hello', function () {
    return 'Hello, World!';
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
