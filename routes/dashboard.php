<?php

use App\Http\Controllers\Dashboard\AccessControl\RoleController;
use App\Http\Controllers\Dashboard\Configurations\ConfigurationController;
use App\Http\Controllers\Dashboard\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('dashboard/configuracoes')->group(function () {
    Route::get('/{id}/edit', [ConfigurationController::class, 'index'])->name('dashboard.configurations.index');

});
Route::middleware(['auth'])->prefix('dashboard/usuarios')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('dashboard.users.index');
    Route::get('/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::post('/store', [UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('dashboard.users.destroy');
    Route::get('/inativos', [UserController::class, 'onlyTrashed'])->name('dashboard.users.onlyTrashed');
    Route::get('/inativos/restore/{id}', [UserController::class, 'restore'])->name('dashboard.users.restore');
    Route::post('/inativos/permanente', [UserController::class, 'forceDelete'])->name('dashboard.users.forceDelete');
});

Route::middleware(['auth'])->prefix('dashboard/grupos')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('dashboard.roles.index');
    Route::post('/store', [RoleController::class, 'store'])->name('dashboard.roles.store');
    Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('dashboard.roles.edit');
    Route::put('/update/{id}', [RoleController::class, 'update'])->name('dashboard.roles.update');
    Route::delete('/destroy/{id}', [RoleController::class, 'destroy'])->name('dashboard.roles.destroy');
});
