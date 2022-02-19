<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PlanDetailsController;
use App\Http\Controllers\Admin\ProfileController;
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
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::delete('permissions/{idPermissao}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::any('permissions/filter', [PermissionController::class, 'search'])->name('permissions.search');
    Route::get('permissions/{idPermissao}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('permissions/{idPermissao}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::get('permissions/{idPermissao}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');

    /**
     * Perfis
     */
    Route::get('profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::delete('profile/{idPerfil}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::any('profile/filter', [ProfileController::class, 'search'])->name('profile.search');
    Route::get('profile/{idPerfil}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{idPerfil}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/{idPerfil}', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');

    /**
     * Plano
     */
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('plans/filter', [PlanController::class, 'search'])->name('plans.search');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('plans/store', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

    /**
     * Dashboard
     */
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');

    /**
     * Detalhes do plano
     */
    Route::get('plan/{url}/details/create', [PlanDetailsController::class, 'create'])->name('details.plan.create');
    Route::delete('plan/{url}/details/{detailId}', [PlanDetailsController::class, 'destroy'])->name('details.plan.destroy');
    Route::get('plan/{url}/details/{detailId}', [PlanDetailsController::class, 'show'])->name('details.plan.show');
    Route::put('plan/{url}/details/{detailId}', [PlanDetailsController::class, 'update'])->name('details.plan.update');
    Route::get('plan/{url}/details/{detailId}/edit', [PlanDetailsController::class, 'edit'])->name('details.plan.edit');
    Route::post('plan/{url}/details', [PlanDetailsController::class, 'store'])->name('details.plan.store');
    Route::get('plan/{url}/details', [PlanDetailsController::class, 'index'])->name('details.plan.index');
});


Route::get('/', function () {
    return view('welcome');
});
