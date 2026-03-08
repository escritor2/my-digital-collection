<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Modules\Dashboard\DashboardController;
use App\Http\Controllers\Modules\ReadingSession\ReadingSessionController;
use App\Http\Controllers\Modules\Book\BookController;
use App\Http\Controllers\Modules\UserShelf\UserBookController;

// Rota padrão redireciona anon para login e logado para dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

// Auth Rotas Públicas Bloqueadas sob middleware guest
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.attempt'); 
});

// Sistema Privado OBRIGA ser logado
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
    
    Route::resource('books', BookController::class);
    Route::resource('user-shelf', UserBookController::class)->except(['create', 'edit']);
    Route::resource('reading-sessions', ReadingSessionController::class);
});