<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelajarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApmController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\KehadiranController;
use Illuminate\Support\Facades\Route;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard untuk Pengguna yang Sah
Route::get('apm/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('apm');

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
    // Paparan dashboard APM (pastikan route dan method betul)
    Route::get('apm', [ApmController::class, 'index'])->name('apm.dashboard');
    
    // Kehadiran APM
    Route::get('apm/kehadiran', [ApmController::class, 'viewAttendance'])->name('apm.kehadiran'); 
    
    // Laporan APM
    Route::get('apm/laporan', [ApmController::class, 'laporan'])->name('apm.laporan');

    // Store attendance (gunakan KehadiranController jika diperlukan)
    Route::post('/kehadiran', [KehadiranController::class, 'tandakanKehadiran'])->name('apm.kehadiran.store');
});

// Route Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Route Auth
require __DIR__.'/auth.php';
