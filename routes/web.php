<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





Route::middleware(['auth', RoleMiddleware::class . ':Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/admin/users', AdminUserController::class);
});

Route::middleware(['auth', RoleMiddleware::class . ':User'])->group(function () {
    Route::get('/home', [UserHomeController::class, 'index'])->name('home');

});

