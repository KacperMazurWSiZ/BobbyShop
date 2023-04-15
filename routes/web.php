<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::name('frontend.')
    ->group(function () {
        Route::match(['get', 'post'], '/', [FrontendController::class, 'index'])->name('index');
    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::match(['get', 'post'], '/login/{token?}', [AuthController::class, 'login'])->name('login');
        Route::middleware('auth.admin')->group(function (){
            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::match(['get', 'post'], '/profile', [IndexController::class, 'profile'])->name('profile');
            Route::name('product.')
                ->prefix('product')
                ->group(function () {
                    Route::get('/', [ProductController::class, 'index'])->name('index');
                    Route::post('/fetchAndSave', [ProductController::class, 'fetchAndSave'])->name('fetchAndSave');
                    Route::match(['get', 'post'], '/edit/{id?}', [ProductController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id?}', [ProductController::class, 'delete'])->name('delete');
                });
            Route::name('category.')
                ->prefix('category')
                ->group(function () {
                    Route::get('/', [CategoryController::class, 'index'])->name('index');
                    Route::match(['get', 'post'], '/edit/{id?}', [CategoryController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id?}', [CategoryController::class, 'delete'])->name('delete');
                });
            Route::name('admin.')
                ->prefix('admin')
                ->middleware('auth.superadmin')
                ->group(function () {
                    Route::get('/', [AdminController::class, 'index'])->name('index');
                    Route::match(['get', 'post'], '/edit/{id?}', [AdminController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id?}', [AdminController::class, 'delete'])->name('delete');
                });
            Route::name('announcement.')
                ->prefix('announcement')
                ->group(function () {
                    Route::get('/', [AnnouncementController::class, 'index'])->name('index');
                    Route::post('/', [AnnouncementController::class, 'create'])->name('create');
                    Route::get('/delete/{id?}', [AnnouncementController::class, 'delete'])->name('delete');
                });
            Route::name('order.')
                ->prefix('order')
                ->group(function () {
                    Route::get('/', [OrderController::class, 'index'])->name('index');
                    Route::get('/show{id?}', [OrderController::class, 'show'])->name('show');
                });
        });
    });
