<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo 'Hello, World!';
});

Route::get('/about', function () {
    echo 'About Us';
});

Route::get('/main/{valor}', [MainController::class, 'index']);
Route::get('/page2/{valor}', [MainController::class, 'page2']);
Route::get('/page3/{valor}', [MainController::class, 'page3']);