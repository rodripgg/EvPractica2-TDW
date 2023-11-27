<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Perro;
use App\Http\Requests\PerroRequest;
use Illuminate\Http\JsonResponse;

class PerroController extends Controller
{
    public function index()
    {
        $perros = Perro::all();
        return view('perros.index', compact('perros'));
    }

    public function create()
    {
        return view('perros.create');
    }

    public function store(PerroRequest $request)
    {
        $perro = Perro::create($request->validated());
        // Lógica para almacenar un nuevo perro
    }

    public function show($id)
    {
        $perro = Perro::findOrFail($id);
        return view('perros.show', compact('perro'));
    }

    public function edit($id)
    {
        $perro = Perro::findOrFail($id);
        return view('perros.edit', compact('perro'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar el perro
    }

    public function destroy($id)
    {
        // Lógica para eliminar el perro (soft delete)
    }

    public function random(): JsonResponse
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
