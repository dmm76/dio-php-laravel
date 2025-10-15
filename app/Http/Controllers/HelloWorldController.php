<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function postHello()
    {
        return response()->json([
            "msg" => "Hello, POST World!"
        ]);
    }

    public function postHelloName(Request $request, ?string $name = null)
    {
        $resolvedName = $name ?? $request->input('name');

        if ($resolvedName === null || $resolvedName === '') {
            return response()->json([
                'error' => 'Nome não informado.'
            ], 422);
        }

        return response()->json([
            'message' => 'Hello, ' . $resolvedName . ' post World!',
            'msg' => $request->foo,
            'payload' => $request->all()

        ]);
    }

    public function hello()
    {
        return response()->json("Hello, World!");
    }

    public function helloName($name)
    {
        return response()->json(["msg" => 'Hello, World!', "name" => $name]);
    }
}
