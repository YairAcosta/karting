<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KartingController;
use Illuminate\Support\Facades\Route;

// 🔐 Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🏎️ Rutas protegidas con middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/', [KartingController::class, 'index'])->name('kartings.index');
    Route::resource('kartings', KartingController::class);
});
