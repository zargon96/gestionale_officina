<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ClienteController;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/clienti', [ClienteController::class, 'index']);


    Route::get('/clienti/{id}', [ClienteController::class, 'show']);


    Route::post('/clienti', [ClienteController::class, 'store']);
    Route::put('/clienti/{id}', [ClienteController::class, 'update']);
    Route::delete('/clienti/{id}', [ClienteController::class, 'destroy']);
});

