<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perro;
use App\Http\Requests\PerroRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class PerroController extends Controller
{
    public function index()
    {
        $perros = Perro::all();
        return response()->json($perros, 200);
    }

    public function create(PerroRequest $request)
    {
        $response = Http::get('https://dog.ceo/api/breeds/image/random');

        if ($response->successful()) {
        $perro = new Perro;
        $perro->nombre = $request->nombre;
        $perro->descripcion = $request->descripcion;
        $perro->url_foto = $response->json()['message'];
        $perro->save();

        return response()->json($perro, 201);
        }

        return response()->json(['error' => 'error al crear'], 500);
    }


    public function show($id)
    {
        $perro = Perro::findOrFail($id);
        return view('perros.show', compact('perro'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar el perro
    }

    public function destroy($id)
    {
        // Lógica para eliminar el perro (soft delete)
    }

    public function random()
    {
         // Obtener un perro aleatorio
        $perro = Perro::inRandomOrder()->first();

        // Retornar solo el nombre e ID del perro
        $data = [
            'id' => $perro->id,
            'nombre' => $perro->nombre,
            'descripcion' => $perro->descripcion,
        ];

        return response()->json($data);
    }
}
