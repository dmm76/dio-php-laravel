<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('hello', function () {
    return 'Hello, World!';
});

Route::get('hello/{name}', function ($name) {
    return 'Hello ' . $name . '!';
});

Route::post('hello-post', function () {
    return 'Hello, POST World!';
});

Route::post('hello-post/{name}', function ($name) {
    return 'Hello, ' . $name . ' POST World!';
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
