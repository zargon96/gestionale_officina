<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\InterventoController;



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

    //rotte auto
    Route::get('clienti/{cliente}/auto/create', [AutoController::class, 'create'])->name('clienti.auto.create');
    Route::post('/clienti/{cliente}/auto/store_auto', [AutoController::class, 'store'])->name('clienti.auto.store');
    Route::get('/clienti/{cliente_id}/auto/{auto_id}/edit_auto', [AutoController::class, 'edit'])->name('clienti.auto.edit');
    Route::post('/clienti/{cliente_id}/auto/{auto_id}', [AutoController::class, 'update'])->name('clienti.auto.update');
    Route::get('/clienti/{cliente_id}/auto/{auto_id}', [AutoController::class, 'show'])->name('clienti.auto.show');
    Route::delete('/clienti/{cliente}/auto/destroy_auto', [AutoController::class, 'destroy'])->name('clienti.auto.destroy');

    //rotte interventi
    Route::get('/clienti/{cliente_id}/auto/{auto_id}/intervento/create', [InterventoController::class, 'create'])->name('intervento.create');
    Route::post('/clienti/{cliente_id}/auto/{auto_id}/intervento/store', [InterventoController::class, 'store'])->name('intervento.store');
    Route::get('/clienti/{cliente_id}/auto/{auto_id}/intervento/show', [InterventoController::class, 'show'])->name('intervento.show');
    Route::get('/clienti/{cliente_id}/auto/{auto_id}/intervento/{intervento_id}/edit', [InterventoController::class, 'edit'])->name('intervento.edit');
    Route::post('/clienti/{cliente_id}/auto/{auto_id}/intervento/{intervento_id}/update', [InterventoController::class, 'update'])->name('intervento.update');
    Route::delete('/clienti/{cliente_id}/auto/{auto_id}/intervento/{intervento_id}/destroy', [InterventoController::class, 'destroy'])->name('intervento.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
