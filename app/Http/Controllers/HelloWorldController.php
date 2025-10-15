<?php

namespace App\Http\Controllers;


class HelloWorldController extends Controller
{
    public function postHello()
    {
        return response()->json("Hello, POST World!");
    }

    public function postHelloName($name)
    {
        return response()->json('Hello, ' . $name . ' POST World!');
    }

    public function hello()
    {
        return response()->json("Hello, World!");
    }

    public function helloName($name)
    {
        return response()->json('Hello, ' . $name . ' World!');
    }
}
