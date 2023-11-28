<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interaccion;

class InteraccionController extends Controller
{
    //funcion para obtener todas las interacciones
    public function index()
    {
        $interacciones = Interaccion::all();
        return response()->json($interacciones, 200);
    }

    //funcion para crear una interaccion
    public function create(Request $request)
    {
        $interaccion = new Interaccion;
        $interaccion->perro_interesado_id = $request->perro_interesado_id;
        $interaccion->perro_candidato_id = $request->perro_candidato_id;
        $interaccion->preferencia = $request->preferencia;
        $interaccion->save();

        return response()->json($interaccion, 201);
    }

    //funcion para obtener una interaccion
    public function show($id)
    {
        $interaccion = Interaccion::findOrFail($id);
        return response()->json($interaccion, 200);
    }

    //funcion para actualizar una interaccion
    public function update(Request $request, $id)
    {
        $interaccion = Interaccion::findOrFail($id);
        $interaccion->perro_interesado_id = $request->perro_interesado_id;
        $interaccion->perro_candidato_id = $request->perro_candidato_id;
        $interaccion->preferencia = $request->preferencia;
        $interaccion->save();

        return response()->json($interaccion, 200);
    }

    //funcion para eliminar una interaccion (soft delete)
    public function destroy($id)
    {
        $interaccion = Interaccion::findOrFail($id);
        $interaccion->delete();

        return response()->json($interaccion, 200);
    }
}
