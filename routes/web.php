<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelajarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApmController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard untuk Pengguna yang Sah
Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Protected Routes untuk Pengguna yang Sah
Route::middleware('auth')->group(function () {
    // Route Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Khusus Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/kehadiran', [AdminController::class, 'kehadiran'])->name('admin.kehadiran');
    Route::get('admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('admin/laporan', [AdminController::class, 'store'])->name('admin.store');

    // Route to display all students
    Route::get('admin/pelajar', [PelajarController::class, 'index'])->name('admin.pelajar');
    
    Route::get('/pelajar/create', [PelajarController::class, 'create'])->name('pelajar.create'); // Create route
    Route::post('/pelajar', [PelajarController::class, 'store'])->name('pelajar.store'); // Store route
});

// Route Khusus APM
Route::middleware(['auth', 'apm'])->group(function () {
    Route::get('apm/kehadiran', [AdminController::class, 'kehadiran'])->name('apm.kehadiran');
    Route::get('apm', [ApmController::class, 'index'])->name('apm.dashboard');
    Route::post('apm/kehadiran', [AdminController::class, 'storeKehadiran'])->name('apm.storeKehadiran'); // Store attendance
    Route::get('apm/kehadiran/{id}/edit', [AdminController::class, 'editKehadiran'])->name('apm.editKehadiran'); // Edit attendance
});

// Route Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Route Auth
require __DIR__.'/auth.php';
