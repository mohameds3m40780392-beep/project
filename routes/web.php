<?php

use App\Http\Controllers\detailsController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartController as ControllersCartController;
use App\Http\Controllers\CartController as HttpControllersCartController;
use App\Http\Controllers\CartController as AppHttpControllersCartController;
use App\Http\Controllers\CartController as CartControllerAlias;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/create', function () {
    return view('create');
});


Route::get('Register', function () {
    return view('register');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/details_product', function () {
    return view('details_product');
})->name('details_product');


Route::get('/Seller', [CartController::class, 'index'])->name('cart.index');
Route::get('/home', [ProductsController::class, 'index'])->name('home');

// مسارات تسجيل الدخول
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// مسارات التسجيل
Route::get('/Register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// مسارات المنتجات
Route::post('/create', [ProductsController::class, 'create'])->name('products.create');





// المسار اللي بيبعت المستخدم لجوجل
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google.redirect');

// المسار اللي جوجل بيرجع عليه البيانات
Route::get('/auth/google/callback', [LoginController::class, 'googleLogin']);

Route::get('/product/{id}', [detailsController::class, 'show'])->name('product.details');


Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
