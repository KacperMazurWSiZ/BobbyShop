<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::match(['get', 'post'], '/login/{token?}', [AuthController::class, 'login'])->name('login');
        Route::middleware('auth.admin')->group(function (){
            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::name('product.')
                ->prefix('product')
                ->group(function () {
                    Route::get('/', [ProductController::class, 'index'])->name('index');
                });
            Route::name('category.')
                ->prefix('category')
                ->group(function () {
                    Route::get('/', [CategoryController::class, 'index'])->name('index');
                    Route::match(['get', 'post'], '/edit/{id?}', [CategoryController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id?}', [CategoryController::class, 'delete'])->name('delete');
                });
        });
    });
