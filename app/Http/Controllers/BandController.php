<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Band;

class BandController extends Controller
{
    public function getAll()
    {
        return response()->json(Band::all());
    }

    public function postStore(Request $request)
    {
        $payload = $request->all();

        if (array_is_list($payload)) {
            $validator = Validator::make(
                ['bands' => $payload],
                [
                    'bands' => 'required|array|min:1',
                    'bands.*.name' => 'required|string|min:5|max:255',
                    'bands.*.genre' => 'required|string|max:255',
                    'bands.*.formed' => 'required|integer|min:1900|max:' . date('Y'),
                ]
            );

            $validated = $validator->validate();

            $created = collect($validated['bands'])->map(function (array $bandData) {
                return Band::create($bandData);
            });

            return response()->json($created, 201);
        }

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
                'error' => 'Nenhuma banda encontrada para o genero especificado.'
            ], 404);
        }

        return response()->json($filteredBands);
    }

    public function getById(int $id)
    {
        $band = Band::find($id);

        if ($band === null) {
            return response()->json([
                'error' => 'Banda nao encontrada.'
            ], 404);
        }

        return response()->json($band);
    }
}
