<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\VerificaAutenticacao;
use Illuminate\Support\Facades\Route;

// rotas de auth
Route::get('/login', [AuthController::class, 'login']);
Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);

Route::middleware([VerificaAutenticacao::class])->group( function() {
    // rotas principais
    Route::get('/', [MainController::class, 'index']);
    Route::get('/novaNota', [MainController::class, 'novaNota']);
    Route::get('/logout', [AuthController::class, 'logout']);
}) ;
