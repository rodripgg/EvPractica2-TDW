<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;

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

Route::get('/perros/random', [PerroController::class, 'random']);
Route::get('/perros', [PerroController::class, 'index']);
Route::post('/perrosCreate', [PerroController::class, 'create']);
Route::delete('/perrosBorrar/{id}', [PerroController::class, 'destroy']);
Route::get('/perro/{id}', [PerroController::class, 'show']);
Route::put('/perroUpdate/{id}', [PerroController::class, 'update']);


