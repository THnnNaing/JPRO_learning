<?php

use Illuminate\Support\Facades\Route;

// For Admin Module
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminViewReviewController;
use App\Http\Controllers\AdminCustomerController;

// For Customer Module
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\RegisterController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\Customer\FoodController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::resource('categories', CategoryController::class);
Route::get('categories_search', [CategoryController::class, 'search'])->name('categories.search');

Route::resource('products', ProductController::class);
Route::get('/products_search', [ProductController::class,'search'])->name('products.search');

Route::get('login', [AdminController::class, 'index'])->name('login');
Route::post('post-login', [AdminController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AdminController::class, 'registration'])->name('register');
Route::post('post-registration', [AdminController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('viewcustomer', [AdminCustomerController::class, 'index'])->name('viewcustomer');
Route::get('/customer_search', [AdminCustomerController::class,'search'])->name('viewcustomer.search');

Route::get('viewreview', [AdminViewReviewController::class,'index'])->name('viewreview');
Route::get('/viewreview_search', [AdminViewReviewController::class,'search'])->name('viewreview.search');


// Customer Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('about', function () {
    return view('customers.aboutus');
})->name('aboutus');

Route::get('register', [RegisterController::class, 'index'])->name('cregister');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('review', [ReviewController::class, 'index'])->name('review');
Route::post('review', [ReviewController::class,'store'])->name('review.store');

Route::get('food', [FoodController::class, 'index'])->name('food');
Route::get('cart', [FoodController::class,'cart'])->name('cart');
Route::get('add-to-cart/{id}', [FoodController::class,'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [FoodController::class,'update'])->name('update.cart');
Route::delete('remove-from-cart', [FoodController::class,'remove'])->name('remove.from.cart');






