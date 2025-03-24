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
    Route::post('/novoSubmit', [MainController::class, 'novoSubmit'])->name('novoSubmit');

    Route::get('/edita/{id}', [MainController::class, 'edita'])->name('edita');
    Route::post('/editaSubmit', [MainController::class, 'editaSubmit'])->name('editaSubmit');

    Route::get('/deleta/{id}', [MainController::class, 'deleta'])->name('deleta');
    Route::get('/deletaConfirmacao/{id}', [MainController::class, 'deletaConfirmacao'])->name('deletaConfirmacao');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
