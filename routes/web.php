<?php

use App\Http\Controllers\Admin\DetalhesPlanoController;
use App\Http\Controllers\Admin\PlanoController;
use App\Http\Controllers\Admin\PerfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')
    // ->namespace('Admin')
    ->group(function() {

    /**
     * Perfis
     */
    Route::get('perfis/novo', [PerfilController::class, 'create'])->name('perfis.create');
    Route::get('perfis', [PerfilController::class, 'index'])->name('perfis.index');
    //  Route::resource('perfis', 'PerfilController');

    /**
     * Detalhes do plano
     */
    Route::get('planos/{url}/detalhes/novo', [DetalhesPlanoController::class, 'create'])->name('detalhes.plano.create');
    Route::delete('planos/{url}/detalhes/{idDetalhe}', [DetalhesPlanoController::class, 'destroy'])->name('detalhes.plano.destroy');
    Route::get('planos/{url}/detalhes/{idDetalhe}', [DetalhesPlanoController::class, 'show'])->name('detalhes.plano.show');
    Route::put('planos/{url}/detalhes/{idDetalhe}', [DetalhesPlanoController::class, 'update'])->name('detalhes.plano.update');
    Route::get('planos/{url}/detalhes/{idDetalhe}/edit', [DetalhesPlanoController::class, 'edit'])->name('detalhes.plano.edit');
    Route::post('planos/{url}/detalhes', [DetalhesPlanoController::class, 'store'])->name('detalhes.plano.store');
    Route::get('planos/{url}/detalhes', [DetalhesPlanoController::class, 'index'])->name('detalhes.plano.index');

    /**
     * Plano
     */
    Route::get('planos/novo', [PlanoController::class, 'create'])->name('planos.create');
    Route::put('planos/{url}', [PlanoController::class, 'update'])->name('planos.update');
    Route::get('planos/{url}/editar', [PlanoController::class, 'edit'])->name('planos.edit');
    Route::any('planos/filtrar', [PlanoController::class, 'search'])->name('planos.search');
    Route::delete('planos/{url}', [PlanoController::class, 'destroy'])->name('planos.destroy');
    Route::get('planos/{url}', [PlanoController::class, 'show'])->name('planos.show');
    Route::post('planos/salvar', [PlanoController::class, 'store'])->name('planos.store');
    Route::get('planos', [PlanoController::class, 'index'])->name('planos.index');

    /**
     * Dashboard
     */
    Route::get('/', [PlanoController::class, 'index'])->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
