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
        // Obtén los datos de la solicitud
        $perroInteresadoId = $request->input('perro_interesado_id');
        $perroCandidatoId = $request->input('perro_candidato_id');
        $preferencia = $request->input('preferencia');

        // Verifica si ya existe una interacción con la misma preferencia
        $interaccionExistente = Interaccion::where('perro_interesado_id', $perroInteresadoId)
            ->where('perro_candidato_id', $perroCandidatoId)
            ->where('preferencia', '!=', $preferencia)
            ->first();

        // Si existe, muestra un mensaje y no guarda la nueva interacción
        if ($interaccionExistente) {
            return response()->json(['message' => 'No puede haber otra interacción con una preferencia distinta sobre el mismo perro.'], 422);
        }

        // Si no existe, procede a registrar la nueva interacción
        $interaccion = new Interaccion([
            'perro_interesado_id' => $perroInteresadoId,
            'perro_candidato_id' => $perroCandidatoId,
            'preferencia' => $preferencia,
        ]);

        $interaccion->save();

        // Retorna un mensaje de éxito
        return response()->json(['message' => 'Interacción registrada correctamente.'], 200);
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

    //funcion match para mostrar un mensaje de match si hay match entre dos perros
    public function match($id)
    {
        $interaccion = Interaccion::findOrFail($id);
        $perro_interesado = $interaccion->perro_interesado_id;
        $perro_candidato = $interaccion->perro_candidato_id;
        $interaccion2 = Interaccion::where('perro_interesado_id', $perro_candidato)->where('perro_candidato_id', $perro_interesado)->first();
        if ($interaccion->preferencia == $interaccion2->preferencia) {
            return response()->json(['message' => 'Match!'], 200);
        } else {
            return response()->json(['message' => 'No hay match'], 200);
        }
    }
}
