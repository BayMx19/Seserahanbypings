<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\KeranjangController as UserKeranjangController;
use App\Http\Controllers\User\PesananController as UserPesananController;
use App\Http\Controllers\User\ReviewController as UserReviewController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\ArtikelController as UserArtikelController;
use App\Http\Controllers\User\GalleryController as UserGalleryController;

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', [WelcomeController::class, 'index']);
Auth::routes();
Route::get('/artikel', [UserArtikelController::class, 'index'])->name('user.artikel.index');
Route::get('/artikel/{slug}', [UserArtikelController::class, 'show'])->name('user.artikel.show');

Route::get('/gallery', [UserGalleryController::class, 'index'])->name('user.gallery.index');

Route::get('/checkout/finish', [UserPesananController::class, 'getCheckoutFinish'])->name('checkout.redirect-finish');
Route::middleware(['auth', RoleMiddleware::class . ':Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/admin/users', AdminUserController::class);
    Route::resource('/admin/produk', AdminProdukController::class);
    Route::get('/admin/data-produk', [AdminProdukController:: class, 'getListProduk']);
    Route::resource('/admin/transaksi', AdminTransaksiController::class);
    Route::resource('/admin/review', AdminReviewController::class)->only(['index', 'show'])->names(['index' => 'admin.data-review.index','show' => 'admin.data-review.show',]);;
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::put('/admin/transaksi/{id}/status', [AdminTransaksiController::class, 'updateTransaksiStatus'])->name('admin.transaksi.updateStatus');
    Route::resource('/admin/artikel', AdminArtikelController::class);
    Route::get('/admin/data-artikel', [AdminArtikelController:: class, 'getListArtikel']);
    Route::resource('/admin/gallery', AdminGalleryController::class);
    Route::get('/admin/data-gallery', [AdminGalleryController:: class, 'getListGallery']);
});
Route::middleware(['auth', RoleMiddleware::class . ':User'])->group(function () {
    Route::get('/home', [UserHomeController::class, 'index'])->name('home');
    Route::resource('/keranjang', UserKeranjangController::class);
    Route::resource('/profile', UserProfileController::class);
    Route::post('/checkout/store', [UserPesananController::class, 'storePesananCheckout'])->name('checkout.store'); 
    Route::get('/checkout/{id}', [UserPesananController::class, 'getCheckoutIndex'])->name('checkout.show'); 
    Route::post('/checkout/finalize/{id}', [UserPesananController::class, 'postCheckoutFinalize'])->name('checkout.finalize');
    Route::post('/checkout/update-status', [UserPesananController::class, 'updateCheckoutStatus'])->name('checkout.updateStatus');
    Route::get('/riwayat-pesanan', [UserPesananController::class, 'getRiwayatPesananIndex'])->name('riwayat-pesanan.index');});
    Route::put('/pesanan/{id}/status-diterima', [UserPesananController::class, 'updateStatusPesananDiterima'])->name('pesanan.update-status-diterima');
    Route::put('/pesanan/{id}/selesaikan', [UserPesananController::class, 'updateStatusPesananSelesai'])->name('pesanan.selesaikan');
    Route::post('/pesanan/review', [UserReviewController::class, 'simpanReview'])->name('pesanan.review.simpan');
