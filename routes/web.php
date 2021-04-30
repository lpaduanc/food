<?php

use App\Http\Controllers\Admin\PlanoController;
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

Route::prefix('admin')->group(function() {
    Route::get('planos/novo', [PlanoController::class, 'create'])->name('planos.create');
    Route::put('planos/{url}', [PlanoController::class, 'update'])->name('planos.update');
    Route::get('planos/{url}/editar', [PlanoController::class, 'edit'])->name('planos.edit');
    Route::any('planos/filtrar', [PlanoController::class, 'search'])->name('planos.search');
    Route::delete('planos/{url}', [PlanoController::class, 'destroy'])->name('planos.destroy');
    Route::get('planos/{url}', [PlanoController::class, 'show'])->name('planos.show');
    Route::post('planos/salvar', [PlanoController::class, 'store'])->name('planos.store');
    Route::get('planos', [PlanoController::class, 'index'])->name('planos.index');

    Route::get('/', [PlanoController::class, 'index'])->name('admin.index');
});


Route::get('/', function () {
    return view('welcome');
});
