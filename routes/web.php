<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BansosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bansos', [BansosController::class, 'index']
); 
