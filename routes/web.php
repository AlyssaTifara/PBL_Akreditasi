<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Kriteria1Controller;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Global pattern
Route::pattern('id', '[0-9]+');

// Route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'postlogin']);
});

// Route untuk yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/', [WelcomeController::class, 'index']);

    // Semua route kriteria1 dibungkus agar hanya bisa diakses setelah login
    Route::prefix('kriteria1')->group(function () {
        Route::get('/', [Kriteria1Controller::class, 'index']);
        Route::post('/list', [Kriteria1Controller::class, 'list']);
        Route::get('/create', [Kriteria1Controller::class, 'create']);
        Route::post('/store', [Kriteria1Controller::class, 'store']);

        // Ajax
        Route::get('/create_ajax', [Kriteria1Controller::class, 'create_ajax']);
        Route::post('/ajax', [Kriteria1Controller::class, 'store_ajax']);
        Route::get('/{id}', [Kriteria1Controller::class, 'show']);
        Route::get('/{id}/edit', [Kriteria1Controller::class, 'edit']);
        Route::put('/{id}', [Kriteria1Controller::class, 'update']);
        Route::delete('/{id}', [Kriteria1Controller::class, 'destroy']);

        // Ajax Update
        Route::get('/{id}/edit_ajax', [Kriteria1Controller::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [Kriteria1Controller::class, 'update_ajax']);

        // Ajax Delete
        Route::get('/{id}/delete_ajax', [Kriteria1Controller::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [Kriteria1Controller::class, 'delete_ajax']);

        // Import Excel
        Route::get('/import', [Kriteria1Controller::class, 'import']);
        Route::post('/import_ajax', [Kriteria1Controller::class, 'import_ajax']);

        // Export Excel
        Route::get('/export_excel', [Kriteria1Controller::class, 'export_excel']);

        // Export PDF
        Route::get('/export_pdf', [Kriteria1Controller::class, 'export_pdf']);
    });

    Route::prefix('dosen')->group(function () {
        Route::get('/', [DosenController::class, 'index']);
        Route::post('/list', [DosenController::class, 'list']);
        Route::post('/create_ajax', [DosenController::class, 'create']);
    });

    // Route::get('dosen', [DosenController::class, 'index']); 
});