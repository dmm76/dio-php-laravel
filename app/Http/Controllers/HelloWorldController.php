<?php

namespace App\Http\Controllers;


class HelloWorldController extends Controller
{
    public function postHello()
    {
        return 'Hello, POST World!';
    }

    public function postHelloName($name)
    {
        return 'Hello, ' . $name . ' POST World!';
    }

    public function hello()
    {
        return 'Hello, World!';
    }

    public function helloName($name)
    {
        return 'Hello ' . $name . '!';
    }
}
