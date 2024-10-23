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
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/kehadiran', [AdminController::class, 'kehadiran'])->name('admin.kehadiran');
    Route::get('admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::post('admin/laporan', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/pelajar', [PelajarController::class, 'index'])->name('admin.pelajar');
    Route::get('/pelajar/create', [PelajarController::class, 'create'])->name('pelajar.create');
    Route::post('/pelajar', [PelajarController::class, 'store'])->name('pelajar.store');
});

// Route APM dengan middleware 'role:apm'
Route::group(['middleware' => ['auth', 'role:apm']], function () {
    Route::get('/apm/dashboard', [ApmController::class, 'index'])->name('apm.dashboard');
    Route::get('/apm/kehadiran', [ApmController::class, 'kehadiran'])->name('apm.kehadiran');
    Route::get('/apm/laporan', [ApmController::class, 'laporan'])->name('apm.laporan');

    // Route POST untuk store attendance (Kehadiran)
    Route::post('/apm/kehadiran/store', [KehadiranController::class, 'store'])->name('apm.store');
});

// Route Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Route untuk Auth (Login, Register, etc.)
require __DIR__.'/auth.php';
