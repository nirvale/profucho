<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth
Route::get('/login', [PublicController::class, 'login'])->name('login');
Route::get('/register', [PublicController::class, 'register'])->name('register');
Route::get('/instructions', [PublicController::class, 'instructions'])->name('instructions');

Route::prefix('intranet')
    ->middleware(['auth'])
    ->group(base_path('routes/intranet.php'));
