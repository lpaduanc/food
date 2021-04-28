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

Route::get('admin/planos/{url}', [PlanoController::class, 'show'])->name('planos.show');
Route::post('admin/planos/salvar', [PlanoController::class, 'store'])->name('planos.store');
Route::get('admin/planos/novo', [PlanoController::class, 'create'])->name('planos.create');
Route::get('admin/planos', [PlanoController::class, 'index'])->name('planos.index');

Route::get('/', function () {
    return view('welcome');
});
