<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* 
    Route for frontend pages
*/

Route::get('/', [PagesController::class, 'index']);
Route::get('/terms-and-condition', [PagesController::class, 'terms_and_condition']);
Route::get('/gallery', [PagesController::class, 'gallery']);
Route::get('/gallery-details/{id}', [PagesController::class, 'gallery_details']);

/* 
    Route for account authentication
*/

Route::get('/account-login', [AuthController::class, 'account_login'])->name('login')->middleware('guest');
Route::post('/account-login', [AuthController::class, 'do_login']);
Route::get('/account-register', [AuthController::class, 'account_register'])->middleware('guest');
Route::post('/account-register', [AuthController::class, 'do_register']);
Route::post('/account-logout', [AuthController::class, 'account_logout']);

Route::get('/package-details/{id}', [PagesController::class, 'package_details']);
Route::get('/package-orders/{id}', [PagesController::class, 'package_orders']);
Route::post('/new-orders', [PagesController::class, 'new_orders']);
Route::get('/pembayaran', [PagesController::class, 'pembayaran']);

/* 
    Route for admin zone
*/
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');
    Route::get('/orders', [AdminController::class, 'orders'])->middleware('auth');
    Route::delete('/orders/{id}', [AdminController::class, 'orders_delete']);
    Route::get('/orders-print/{id}', [AdminController::class, 'orders_print'])->middleware('auth');

    /*::Route for payments:: */
    Route::get('/payments', [AdminController::class, 'payments'])->middleware('auth');
    Route::post('/new-payments-link', [AdminController::class, 'new_payments_link']);
    Route::delete('/payments/{id}', [AdminController::class, 'payments_delete']);
    Route::post('/payments-update/{id}', [AdminController::class, 'payments_update']);

    /*::Route for package:: */
    Route::get('/package', [AdminController::class, 'package'])->middleware('auth');
    Route::post('/new-package', [AdminController::class, 'new_package']);
    Route::get('/package-details', [AdminController::class, 'package_details']);
    Route::post('/package-update/{id}', [AdminController::class, 'package_update']);
    Route::get('/package-delete/{id}', [AdminController::class, 'package_delete']);

    /*::Route for items:: */
    Route::get('/items', [AdminController::class, 'items'])->middleware('auth');
    Route::post('/new-items', [AdminController::class, 'new_items']);
    Route::delete('/items/{id}', [AdminController::class, 'items_delete']);
    Route::post('/items-update/{id}', [AdminController::class, 'items_update']);

    /*:: Route for gallery:: */
    Route::get('/gallery', [AdminController::class, 'gallery'])->middleware('auth');
    Route::post('/gallery', [AdminController::class, 'new_gallery'])->middleware('auth');
    Route::post('/gallery-update/{id}', [AdminController::class, 'gallery_update'])->middleware('auth');
    Route::delete('/gallery/{id}', [AdminController::class, 'gallery_delete'])->middleware('auth');
});
