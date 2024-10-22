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

// Default Dashboard Route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Point to your default dashboard view
    })->name('dashboard');

    Route::get('apm/dashboard', [ApmController::class, 'index'])->name('apm.dashboard'); // Change to ApmController

    // Route Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// // Route Khusus Admin
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('admin/kehadiran', [AdminController::class, 'kehadiran'])->name('admin.kehadiran');
//     Route::get('admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
//     Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::post('admin/laporan', [AdminController::class, 'store'])->name('admin.store');

//     // Route to display all students
//     Route::get('admin/pelajar', [PelajarController::class, 'index'])->name('admin.pelajar');
//     Route::get('/pelajar/create', [PelajarController::class, 'create'])->name('pelajar.create'); // Create route
//     Route::post('/pelajar', [PelajarController::class, 'store'])->name('pelajar.store'); // Store route
// });

// // Route Khusus APM
// Route::middleware(['auth', 'apm'])->group(function () {
//     // Paparan dashboard APM
//     Route::get('apm', [ApmController::class, 'index'])->name('apm.dashboard');
    
//     // Kehadiran APM
//     Route::get('apm/kehadiran', [ApmController::class, 'viewAttendance'])->name('apm.kehadiran'); 
    
//     // Laporan APM
//     Route::get('apm/laporan', [ApmController::class, 'laporan'])->name('apm.laporan');

//     // Store attendance
//     Route::post('/kehadiran', [KehadiranController::class, 'tandakanKehadiran'])->name('apm.kehadiran.store');
// });

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/kehadiran', [AdminController::class, 'kehadiran'])->name('admin.kehadiran');
    Route::get('admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/pelajar', [AdminController::class, 'index'])->name('admin.pelajar');
    Route::post('admin/laporan', [AdminController::class, 'store'])->name('admin.store');
});

Route::group(['middleware' => ['role:apm']], function () {
    Route::get('/apm/dashboard', [ApmController::class, 'index'])->name('apm.dashboard');
    Route::get('/apm/kehadiran', [ApmController::class, 'kehadiran'])->name('apm.kehadiran');
    Route::get('apm/laporan', [ApmController::class, 'laporan'])->name('apm.laporan');
    Route::post('apm/kehadiran/store', [ApmController::class, 'store'])->name('apm.store');
});


// Route Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Route Auth
require __DIR__.'/auth.php';
