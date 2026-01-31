<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Client;
use App\Http\Controllers\Admin\CategoryController;
// use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [Admin\ProductController::class, 'index'])->name('index');
        Route::get('/create', [Admin\ProductController::class, 'create'])->name('create');
        Route::get('/{product}/edit', [Admin\ProductController::class, 'edit'])->name('edit');
        Route::post('/', [Admin\ProductController::class, 'store'])->name('store');
        Route::put('/{product}', [Admin\ProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [Admin\ProductController::class, 'destroy'])->name('delete');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('delete');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('delete');
    });
});

Route::prefix('client')->name('client.')->group(function () {
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [Client\ProductController::class, 'index'])->name('index');
        Route::get('/{product}', [Client\ProductController::class, 'show'])->name('show');
    });
});
