<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\ProgramBantuanController;
use App\Http\Controllers\MultipleuploadsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;



Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])
        ->name('password.request');

    // kirim email reset
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
        ->name('password.email');

    // form password baru
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');

    // simpan password baru
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
        ->name('password.update');
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])
        ->name('profile.index');

    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/bansos', [BansosController::class, 'index'])->name('bansos.index');

    Route::get('/home', [HomeController::class, 'index']);

    Route::resource('pelanggan', PelangganController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::resource('program', ProgramBantuanController::class);
    Route::resource('pendaftar', PendaftarController::class);

    Route::resource('berita', App\Http\Controllers\BeritaController::class);

    Route::post(
        '/berita/{id}/media/upload',
        [App\Http\Controllers\MediaController::class, 'uploadBerita']
    )->name('berita.media.upload');

    Route::delete(
        '/media/{media_id}',
        [App\Http\Controllers\MediaController::class, 'destroy']
    )->name('media.delete');

    // Multiple uploads
    Route::get('/multipleuploads', 'MultipleuploadsController@index')->name('uploads');
    Route::post('/save', 'MultipleuploadsController@store')->name('uploads.store');

    // Question
    Route::post('question/store', [QuestionController::class, 'store'])
        ->name('question.store');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->middleware('auth')->name('logout');



Route::get('/cek-user', function () {
    return Auth::user();
});
