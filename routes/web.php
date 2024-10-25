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

// Route untuk dashboard (Authenticated users sahaja)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Admin dengan middleware 'role:admin'
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    // Laluan resource untuk Pelajar dengan nama 'admin.pelajar'
    Route::resource('/admin/pelajar', PelajarController::class, ['as' => 'admin'])->except(['show']);

    // Route Kehadiran menggunakan KehadiranController
    Route::get('/admin/kehadiran', [KehadiranController::class, 'adminIndex'])->name('admin.kehadiran');

    Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::post('/admin/laporan', [AdminController::class, 'store'])->name('admin.store');

    // Route Pelajar - menggunakan resource untuk handle semua route CRUD kecuali 'show'
    Route::resource('/admin/pelajar', PelajarController::class)->except(['show']);
    Route::get('/admin/index', [AdminController::class, 'hazikh'])->name('admin.index');
    Route::get('/apm/laporan', [ApmController::class, 'laporan'])->name('apm.laporan');
    Route::post('/apm/laporan/store', [ApmController::class, 'storeLaporan'])->name('apm.laporan.store');
});

// Route APM dengan middleware 'role:apm'
Route::middleware(['auth', 'role:apm'])->group(function () {
    Route::get('/apm/dashboard', [ApmController::class, 'index'])->name('apm.dashboard');
    Route::get('/apm/kehadiran', [ApmController::class, 'kehadiran'])->name('apm.kehadiran');
    Route::get('/apm/laporan', [ApmController::class, 'laporan'])->name('apm.laporan');

    // Route POST untuk store kehadiran
    Route::post('/kehadiran/store', [KehadiranController::class, 'store'])->name('kehadiran.store');
});

// Route Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Route untuk Auth (Login, Register, etc.)
require __DIR__ . '/auth.php';
