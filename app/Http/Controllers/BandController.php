<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll()
    {
        $bands = $this->getBands();

        return response()->json($bands);
    }

    public function postStore()
    {
        return response()->json([
            'message' => 'Banda armazenada com sucesso!'
        ], 201);
    }


    public function getByGender($gender)
    {
        $bands = $this->getBands();
        $filteredBands = [];

        foreach ($bands as $band) {
            if (stripos($band['genre'], $gender) !== false) {
                $filteredBands[] = $band;
            }
        }

        if (empty($filteredBands)) {
            return response()->json([
                'error' => 'Nenhuma banda encontrada para o gênero especificado.'
            ], 404);
        }

        return response()->json($filteredBands);
    }

    public function getById(int $id)
    {
        $bands = $this->getBands();
        $band = null;

        foreach ($bands as $b) {
            if ($b['id'] == (int)$id) {
                $band = $b;
                break;
            }
        }

        if ($band === null) {
            return response()->json([
                'error' => 'Banda não encontrada.'
            ], 404);
        }

        return response()->json($band);
    }

    public function getBands()
    {
        return [
            [
                "id" => 1,
                "name" => "The Beatles",
                "genre" => "Rock",
                "formed" => 1960
            ],
            [
                "id" => 2,
                "name" => "Led Zeppelin",
                "genre" => "Rock",
                "formed" => 1968
            ],
            [
                "id" => 3,
                "name" => "Pink Floyd",
                "genre" => "Progressive Rock",
                "formed" => 1965
            ],
            [
                "id" => 4,
                "name" => "Queen",
                "genre" => "Rock",
                "formed" => 1970
            ],
            [
                "id" => 5,
                "name" => "Nirvana",
                "genre" => "Grunge",
                "formed" => 1987
            ]
        ];
    }
}
