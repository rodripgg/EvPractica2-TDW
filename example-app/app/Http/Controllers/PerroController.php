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
        return response()->json($perro, 201);
    }

    public function update(Request $request, $id)
    {
        $perro = Perro::find($id);
        if ($perro) {

            if ($request->has('nombre')) {
                $perro->nombre = $request->nombre;
            }
            if ($request->has('descripcion')) {
                $perro->descripcion = $request->descripcion;
            }
            if ($request->has('url_foto')) {
                $perro->url_foto = $request->url_foto;
            }
            $perro->save();
    
            return response()->json($perro, 200);
        }
        return response()->json(['error' => 'perro no encontrado'], 404);
    }

    public function destroy($id)
    {
        $perro = Perro::find($id);

        if($perro){
            $perro->delete();
            return response()->json(['message' => 'perro eliminado'], 200);
        }

        return response()->json(['error' => 'perro no encontrado'], 404);
    }

    public function random()
    {
         // Obtener un perro aleatorio
        $perro = Perro::inRandomOrder()->first();

        // Retornar solo el nombre e ID del perro
        $data = [
            'id' => $perro->id,
            'nombre' => $perro->nombre,
        ];

        return response()->json($data);
    }

    //ecibe el id del perro interesado y retorna un perro random distinto al del id recibido
    public function candidato($id)
    {
        $perro = Perro::inRandomOrder()->where('id', '!=', $id)->first();

        // Retornar solo el nombre e ID del perro
        $data = [
            'id' => $perro->id,
            'nombre' => $perro->nombre,
            'descripcion' => $perro->descripcion,
        ];

        return response()->json($data);
    }
}
