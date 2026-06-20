<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\UserController;

// Halaman Welcome / Landing
Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/monitoring', [DashboardController::class, 'monitoring'])->name('monitoring');
    Route::get('/visualisasi', [DashboardController::class, 'visualisasi'])->name('visualisasi');
    Route::get('/filtering', [DashboardController::class, 'filtering'])->name('filtering');
    Route::get('/faq', [DashboardController::class, 'faq'])->name('faq');

    // Aset
    Route::get('/total-aset', [AsetController::class, 'totalAset'])->name('total-aset');
    Route::get('/laporan-aset', [AsetController::class, 'laporanAset'])->name('laporan-aset');
    Route::post('/laporan-aset', [AsetController::class, 'storeLaporanAset'])->name('laporan-aset.store');

    // Manajemen Pengguna
    Route::get('/manajemen-pengguna', [UserController::class, 'manajemenPengguna'])->name('manajemen-pengguna');
    Route::post('/manajemen-pengguna', [UserController::class, 'updatePengguna'])->name('manajemen-pengguna.update');

    // Edit Profil
    Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    Route::post('/profil', [UserController::class, 'updateProfil'])->name('profil.update');
});
