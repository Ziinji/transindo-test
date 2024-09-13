<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\MerchantAuthController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Catering routes
Route::resource('caterings', CateringController::class);

// Menu routes
Route::resource('menus', MenuController::class);

// Order routes
Route::resource('orders', OrderController::class);

// Customer Auth Routes
Route::get('customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::post('customer/login', [CustomerAuthController::class, 'login']);
Route::get('customer/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
Route::post('customer/register', [CustomerAuthController::class, 'register']);

// Merchant Auth Routes
Route::get('merchant/login', [MerchantAuthController::class, 'showLoginForm'])->name('merchant.login');
Route::post('merchant/login', [MerchantAuthController::class, 'login']);
Route::get('merchant/register', [MerchantAuthController::class, 'showRegisterForm'])->name('merchant.register');
Route::post('merchant/register', [MerchantAuthController::class, 'register']);

// Customer Dashboard Route
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
});

// Merchant Dashboard Route
Route::middleware(['auth', 'merchant'])->group(function () {
    Route::get('/merchant/dashboard', [MerchantDashboardController::class, 'index'])->name('merchant.dashboard');
});

/* Catering routes
Route::get('/caterings', [CateringController::class, 'index'])->name('caterings.index');
Route::get('/caterings/{id}', [CateringController::class, 'show'])->name('caterings.show');

// Menu routes
Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
Route::get('/menus/{id}', [MenuController::class, 'show'])->name('menus.show');

// Order routes (if applicable)
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
