<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Public kegiatan routes
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/create-admin', [AuthController::class, 'createAdmin'])->name('create.admin');

// Admin routes (protected by auth middleware)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    // Kegiatan management
    Route::get('/kegiatan', [AdminController::class, 'kegiatan'])->name('kegiatan');
    Route::get('/kegiatan/create', [AdminController::class, 'createKegiatan'])->name('kegiatan.create');
    Route::post('/kegiatan', [AdminController::class, 'storeKegiatan'])->name('kegiatan.store');
    Route::get('/kegiatan/{kegiatan}/edit', [AdminController::class, 'editKegiatan'])->name('kegiatan.edit');
    Route::put('/kegiatan/{kegiatan}', [AdminController::class, 'updateKegiatan'])->name('kegiatan.update');
    Route::delete('/kegiatan/{kegiatan}', [AdminController::class, 'destroyKegiatan'])->name('kegiatan.destroy');
    
    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});

// Legacy admin routes (keep for backward compatibility)
Route::middleware('auth')->group(function () {
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
});

// API routes for public stats
Route::get('/api/stats', [AdminController::class, 'publicStats'])->name('api.stats');

// Test route untuk form
Route::get('/test-form', function() {
    return view('kegiatan.test-form');
})->name('test.form');
