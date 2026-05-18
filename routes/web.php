<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

/* ================= halaman ================= */
Route::get('/', function () {
    return view('index');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/upload', [UploadController::class, 'store'])
    ->name('upload.store');
// routes/web.php

Route::get('/view/{id}', [DataController::class, 'show'])->name('view');

Route::post('/cek-password', [DataController::class, 'cekPassword'])
    ->name('cek.password');

/* ================= halaman ================= */

Route::get('/', [IndexController::class, 'index']);

/* ================= GOOGLE LOGIN ================= */

Route::get('/google-login', [AuthController::class, 'googleLogin'])
    ->name('google.login');

Route::get('/google-callback', [AuthController::class, 'googleCallback'])
    ->name('google.callback');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');
    
Route::get('/login', function () {
    return view('welcome');
});

Route::get('/auth/google', [GoogleController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);
Route::get('/logout', [GoogleController::class, 'logout']);