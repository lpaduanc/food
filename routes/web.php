<?php

use App\Http\Controllers\Admin\DetalhesPlanoController;
use App\Http\Controllers\Admin\PlanoController;
use App\Http\Controllers\Admin\PerfilController;
use App\Http\Controllers\Admin\PermissaoController;
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
     * Permissões
     */
    Route::get('permissoes/novo', [PermissaoController::class, 'create'])->name('permissoes.create');
    Route::delete('permissoes/{idPermissao}', [PermissaoController::class, 'destroy'])->name('permissoes.destroy');
    Route::any('permissoes/filtrar', [PermissaoController::class, 'search'])->name('permissoes.search');
    Route::get('permissoes/{idPermissao}/editar', [PermissaoController::class, 'edit'])->name('permissoes.edit');
    Route::put('permissoes/{idPermissao}', [PermissaoController::class, 'update'])->name('permissoes.update');
    Route::get('permissoes/{idPermissao}', [PermissaoController::class, 'show'])->name('permissoes.show');
    Route::post('permissoes/salvar', [PermissaoController::class, 'store'])->name('permissoes.store');
    Route::get('permissoes', [PermissaoController::class, 'index'])->name('permissoes.index');

    /**
     * Perfis
     */
    Route::get('perfis/novo', [PerfilController::class, 'create'])->name('perfis.create');
    Route::delete('perfis/{idPerfil}', [PerfilController::class, 'destroy'])->name('perfis.destroy');
    Route::any('perfis/filtrar', [PerfilController::class, 'search'])->name('perfis.search');
    Route::get('perfis/{idPerfil}/editar', [PerfilController::class, 'edit'])->name('perfis.edit');
    Route::put('perfis/{idPerfil}', [PerfilController::class, 'update'])->name('perfis.update');
    Route::get('perfis/{idPerfil}', [PerfilController::class, 'show'])->name('perfis.show');
    Route::post('perfis/salvar', [PerfilController::class, 'store'])->name('perfis.store');
    Route::get('perfis', [PerfilController::class, 'index'])->name('perfis.index');

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
