<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// rutas de perros
Route::get('/perros/random', [PerroController::class, 'random']);
Route::get('/perros', [PerroController::class, 'index']);
Route::post('/perrosCreate', [PerroController::class, 'create']);
Route::delete('/perrosBorrar/{id}', [PerroController::class, 'destroy']);
Route::get('/perro/{id}', [PerroController::class, 'show']);
Route::put('/perroUpdate/{id}', [PerroController::class, 'update']);

//ruta de candidatos
Route::get('/candidato/{id}', [PerroController::class, 'candidato']);

//ruta match
Route::get('/match/{idInterasado}/{idCandidato}', [InteraccionController::class, 'match']);


// rutas de interacciones
Route::get('/interacciones', [InteraccionController::class, 'index']);
Route::post('/interaccionesCreate', [InteraccionController::class, 'create']);
Route::get('/interacciones/{id}', [InteraccionController::class, 'show']);
Route::put('/interacciones/{id}', [InteraccionController::class, 'update']);
Route::delete('/interacciones/{id}', [InteraccionController::class, 'destroy']);

Route::get('/interacciones/aceptados/{id}', [InteraccionController::class, 'aceptados']);
Route::get('/interacciones/rechazados/{id}', [InteraccionController::class, 'rechazados']);


