<?php

namespace App\Http\Controllers;

;

use Illuminate\Http\Request;
use App\Models\Interaccion;
use App\Models\Perro;

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

    public function aceptados($id)
    {
        $interaccion = Interaccion::where('perro_interesado_id', $id)->where('preferencia', 'aceptado')->get();
        if ($interaccion->isEmpty()) {
            return response()->json(['error' => 'no hay perros aceptados'], 404);
        }
        return response()->json($interaccion);
    }

    public function rechazados($id)
    {
        $interaccion = Interaccion::where('perro_interesado_id', $id)->where('preferencia', 'rechazado')->get();
        if ($interaccion->isEmpty()) {
            return response()->json(['error' => 'no hay perros rechazados'], 404);
        }
        return response()->json($interaccion);
    }

    //funcion match para mostrar un mensaje de match si hay match entre dos perros, entra los id de los perros interesado y candidato, si mutuamente se aceptan, hay match
    public function match($idCandidato, $idInteresado)
    {
        $interaccion = Interaccion::where('perro_interesado_id', $idInteresado)->where('perro_candidato_id', $idCandidato)->where('preferencia', 'aceptado')->first();
        $interaccion2 = Interaccion::where('perro_interesado_id', $idCandidato)->where('perro_candidato_id', $idInteresado)->where('preferencia', 'aceptado')->first();

        if ($interaccion && $interaccion2) {
            return response()->json(['message' => 'match'], 200);
        }
        return response()->json(['message' => 'no hay match'], 204);

    }

    public function random($idInteresado)
    {
        // Obtener todos los perros
        $perros = Perro::all();
        // Obtener los perros que ya han recibido una interacción ya sea aceptado o rechazado
        $perrosAceptados = Interaccion::where('perro_interesado_id', $idInteresado)->where('preferencia', 'aceptado')->pluck('perro_candidato_id');
        $perrosRechazados = Interaccion::where('perro_interesado_id', $idInteresado)->where('preferencia', 'rechazado')->pluck('perro_candidato_id');
        // perros ya aceptados o rechazados
        $perrosConInteraccion = $perrosAceptados->merge($perrosRechazados);
        // Obtener los perros que no han recibido una interacción
        $perrosSinInteraccion = $perros->whereNotIn('id', $perrosConInteraccion);
        // si no hay perros sin interaccion, se muestra un mensaje indicando que no hay mas perros
        if ($perrosSinInteraccion->isEmpty()) {
            return response()->json(['message' => 'No hay más perros.'], 404);
        }
        // Obtener un perro aleatorio de los que no han recibido una interacción
        $perroAleatorio = $perrosSinInteraccion->random();
        // se retorna el perro aleatorio id, nombre, foto_url, descripcion
        $data = [
            'id' => $perroAleatorio->id,
            'nombre' => $perroAleatorio->nombre,
            'url_foto' => $perroAleatorio->url_foto,
            'descripcion' => $perroAleatorio->descripcion,
        ];
        return response()->json($data);
    }
}

