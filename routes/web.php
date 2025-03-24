<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\VerificaAutenticacao;
use App\Http\Middleware\VerificaNaoAutenticado;
use Illuminate\Support\Facades\Route;

Route::middleware([VerificaNaoAutenticado::class])->group( function() {
    // rotas de auth
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);
});

Route::middleware([VerificaAutenticacao::class])->group( function() {
    // rotas principais
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/novo', [MainController::class, 'novo'])->name('novo');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
