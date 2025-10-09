<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bansos', [BansosController::class, 'index'])->name('bansos.index'); 

Route::get('/auth', [AuthController::class, 'showLoginForm']);

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

