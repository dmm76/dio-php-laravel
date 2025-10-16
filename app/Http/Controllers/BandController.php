<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class BandController extends Controller
{
    public function getAll()
    {
        return response()->json(Band::all());
    }

    public function postStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'genre' => 'required|string|max:255',
            'formed' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $band = Band::create($data);
        return response()->json($band, 201);
    }


    public function getByGender($gender)
    {
        $filteredBands = Band::where('genre', 'LIKE', '%' . $gender . '%')->get();

        if ($filteredBands->isEmpty()) {
            return response()->json([
                'error' => 'Nenhuma banda encontrada para o gênero especificado.'
            ], 404);
        }

        return response()->json($filteredBands);
    }

    public function getById(int $id)
    {
        $band = Band::find($id);

        if ($band === null) {
            return response()->json([
                'error' => 'Banda não encontrada.'
            ], 404);
        }

        return response()->json($band);
    }

    // public function getBands()
    // {
    //     return [
    //         [
    //             "id" => 1,
    //             "name" => "The Beatles",
    //             "genre" => "Rock",
    //             "formed" => 1960
    //         ],
    //         [
    //             "id" => 2,
    //             "name" => "Led Zeppelin",
    //             "genre" => "Rock",
    //             "formed" => 1968
    //         ],
    //         [
    //             "id" => 3,
    //             "name" => "Pink Floyd",
    //             "genre" => "Progressive Rock",
    //             "formed" => 1965
    //         ],
    //         [
    //             "id" => 4,
    //             "name" => "Queen",
    //             "genre" => "Rock",
    //             "formed" => 1970
    //         ],
    //         [
    //             "id" => 5,
    //             "name" => "Nirvana",
    //             "genre" => "Grunge",
    //             "formed" => 1987
    //         ]
    //     ];
    // }
}
