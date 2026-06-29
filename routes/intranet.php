<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

// dasboard
// Route::get('/', [IntranetController::class, 'dashboard'])->name('dashboard');

Route::middleware(['permission:Dashboard'])->group(function () {
    Route::get('/', [IntranetController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['permission:Jugar'])->group(function () {
    Route::get('/fases/grupos', [IntranetController::class, 'grupos'])->name('fases.grupos');
    Route::get('/fases/dieciseisavos', [IntranetController::class, 'dieciseisavos'])->name('fases.dieciseisavos');
});

Route::middleware(['permission:Administrar usuarios'])->group(function () {
    Route::get('/admin/users', [IntranetController::class, 'users'])->name('admin.users');

});

Route::middleware(['permission:Administrar operación'])->group(function () {
    Route::get('/admin/games', [IntranetController::class, 'games'])->name('admin.games');

});

Route::middleware([''])->group(function () {
    Route::get('/user/avatar/{filename}', [ProfileController::class, 'avatar'])->name('avatar.displayImage');
});

Route::middleware(['permission:Modificar perfil'])->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'profile'])->name('profile.show');
});

Route::middleware(['permission:Administrar operación'])->group(function () {
    Route::get('/admin/users', [IntranetController::class, 'users'])->name('admin.users');

});
