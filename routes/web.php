<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\ClienteController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['web'])->group(function () {
    Route::get('/clienti', [ClienteController::class, 'index'])->name('clienti.index');
    Route::get('/clienti/create', [ClienteController::class, 'create'])->name('clienti.create');
    Route::post('/clienti', [ClienteController::class, 'store'])->name('clienti.store');
    Route::get('/clienti/{id}', [ClienteController::class, 'show'])->name('clienti.show');
    Route::get('/clienti/{id}/edit', [ClienteController::class, 'edit'])->name('clienti.edit');
    Route::post('/clienti/{id}', [ClienteController::class, 'update'])->name('clienti.update');
    Route::delete('/clienti/{id}', [ClienteController::class, 'destroy'])->name('clienti.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
