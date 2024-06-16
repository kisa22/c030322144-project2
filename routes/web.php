<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Rute untuk login pengguna biasa
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk login admin
Route::get('admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'adminLogin']);
Route::post('admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin-dashboard/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin-dashboard/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin-dashboard/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin-dashboard/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin-dashboard/products/{id}', [ProductController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/admin-dashboard/products/{id}', [ProductController::class, 'destroyItem'])->name('admin.products.destroy');
    Route::get('/admin-dashboard/products/search', [ProductController::class, 'search'])->name('admin.products.search');
});

// Other routes
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/products', [HomeController::class, 'show'])->name('products.index');
Route::get('/products/search', [HomeController::class, 'search'])->name('products.search');