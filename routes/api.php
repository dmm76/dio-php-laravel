<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;


Route::get(
    'hello',
    [HelloWorldController::class, 'hello']
);

Route::get(
    'hello/{name}',
    [HelloWorldController::class, 'helloName']
);

Route::post(
    'hello-post',
    [HelloWorldController::class, 'postHello']
);

Route::post(
    'hello-post/{name}',
    [HelloWorldController::class, 'postHelloName']
);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
