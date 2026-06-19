<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;

// ============================================================
// FRONT-END (Publik - tanpa login)
// ============================================================
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/products/{id}', [PageController::class, 'productShow'])->name('products.show');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{id}', [PageController::class, 'newsShow'])->name('news.show');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

// ============================================================
// AUTHENTICATION (Manual - tanpa package)
// ============================================================
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// ============================================================
// ADMIN PANEL (Dilindungi oleh Middleware Auth Bawaan)
// ============================================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // CRUD Artikel
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);

    // CRUD Produk
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

    // CRUD Galeri
    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);

    // Profil Perusahaan (hanya edit & update, 1 record)
    Route::get('company-profile', [\App\Http\Controllers\Admin\CompanyProfileController::class, 'edit'])->name('company-profile.edit');
    Route::put('company-profile', [\App\Http\Controllers\Admin\CompanyProfileController::class, 'update'])->name('company-profile.update');

    // Export PDF
    Route::get('articles-pdf', [\App\Http\Controllers\Admin\ArticleController::class, 'exportPdf'])->name('articles.pdf');
    Route::get('products-pdf', [\App\Http\Controllers\Admin\ProductController::class, 'exportPdf'])->name('products.pdf');
});
