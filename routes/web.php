<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('home');
});

// Menggunakan array syntax untuk route controller
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'auth'], function () {  

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{id}/update', [SiswaController::class, 'update']);
    Route::get('/siswa/{id}/delete', [SiswaController::class, 'delete']);
    Route::get('/siswa/{id}/profile', [SiswaController::class, 'profile']);

});