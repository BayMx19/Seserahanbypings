<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\KeranjangController as UserKeranjangController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

Route::middleware(['auth', RoleMiddleware::class . ':Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/admin/users', AdminUserController::class);
    Route::resource('/admin/produk', AdminProdukController::class);
    Route::get('/admin/data-produk', [AdminProdukController:: class, 'getListProduk']);
    Route::resource('/admin/transaksi', AdminTransaksiController::class);
    Route::resource('/admin/review', AdminReviewController::class);
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');

});

Route::middleware(['auth', RoleMiddleware::class . ':User'])->group(function () {
    Route::get('/home', [UserHomeController::class, 'index'])->name('home');
    Route::resource('/keranjang', UserKeranjangController::class);
    Route::resource('/profile', UserProfileController::class);
});

