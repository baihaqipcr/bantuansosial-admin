<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenerimaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bansos', [BansosController::class, 'index'])->name('bansos.index'); 

Route::get('/auth', [AuthController::class, 'showLoginForm']);

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::resource('pelanggan', PelangganController::class);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('penerima', PelangganController::class);
