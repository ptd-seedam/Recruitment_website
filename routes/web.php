<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NhapHangController;

Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/auth-login', [UserController::class, 'auth_login'])->name('auth_login');

Route::middleware(['checklogin'])->prefix('B2103421')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // User
    Route::get('/user/list', [UserController::class, 'list'])->name('user.index');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

    // danh thu
    Route::post('/revenue', [DashboardController::class, 'revenue'])->name('revenue');

    // Product routes
    Route::get('/Product/list', [ProductController::class, 'list'])->name('product.list');
    Route::get('/Product/add', [ProductController::class, 'add'])->name('product.add');
    Route::post('/Product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/Product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/Product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/Product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    // order routes
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/order/{id}/update', [OrderController::class, 'update'])->name('order.update');
    Route::get('/order/{id}/delete', [OrderController::class, 'destroy'])->name('order.delete');
    Route::get('/order/create/new', [OrderController::class, 'create_all'])->name('order.create');

    // Nhập hàng
    Route::get('/nhap', [NhapHangController::class, 'index'])->name('nhap.index');
    Route::get('/nhap/{id}', [NhapHangController::class, 'show'])->name('nhap.show');
    Route::post('/nhap/store', [NhapHangController::class, 'store'])->name('nhap.store');
    Route::get('/nhap/{id}/edit', [NhapHangController::class, 'edit'])->name('nhap.edit');
    Route::post('/nhap/{id}/update', [NhapHangController::class, 'update'])->name('nhap.update');
    Route::get('/nhap/{id}/delete', [NhapHangController::class, 'destroy'])->name('nhap.delete');
    Route::get('/nhap/create/new', [NhapHangController::class, 'create_all'])->name('nhap.create');
    // customer
    Route::prefix('customer')->group(function () {

        Route::get('/', [CustomerController::class, 'list'])->name('customer.list');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/{id}/update', [CustomerController::class, 'update'])->name('customer.update');
        Route::get('/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
    });
});
