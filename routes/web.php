<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\ProgramBantuanController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\MultipleuploadsController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\BeritaController;

// Halaman login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Redirect root ke login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
});

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::get('/bansos', [BansosController::class, 'index'])->name('bansos.index');

Route::get('/auth', [AuthController::class, 'showLoginForm']);

Route::post('login', [AuthController::class, 'login'])
    ->name('login.post');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::resource('pelanggan', PelangganController::class);

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('penerima', PenerimaController::class);

Route::resource('program', ProgramBantuanController::class);

Route::resource('pendaftar', PendaftarController::class);


Route::get('/multipleuploads', 'MultipleuploadsController@index')->name('uploads');

Route::post('/save', 'MultipleuploadsController@store')->name('uploads.store');

Route::resource('berita', App\Http\Controllers\BeritaController::class);

// MEDIA untuk BERITA
Route::post(
    '/berita/{id}/media/upload',
    [App\Http\Controllers\MediaController::class, 'uploadBerita']
)->name('berita.media.upload');

Route::delete(
    '/media/{media_id}',
    [App\Http\Controllers\MediaController::class, 'destroy']
)->name('media.delete');
