<?php

use Illuminate\Support\Facades\Route;

// For Admin Module
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::resource('categories', CategoryController::class);

// For Search
Route::get('categories_search', [CategoryController::class, 'search'])->name('categories.search');


Route::resource('products', ProductController::class);

Route::get('/products_search', [ProductController::class, 'search'])->name('products.search');

Route::get('login', [AdminController::class, 'index'])->name('login');
Route::post('post-login', [AdminController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AdminController::class, 'registration'])->name('register');
Route::post('post-registration', [AdminController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
