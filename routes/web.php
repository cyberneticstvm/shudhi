<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authenticate')->name('authenticate');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'signup')->name('signup');
    });
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::prefix('/')->controller(AdminController::class)->group(function () {
        Route::get('account', 'account')->name('account');
        Route::get('logout', 'logout')->name('logout');
    });
});

Route::middleware(['web', 'auth', 'admin'])->group(function () {
    Route::prefix('admin/')->controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'admindashboard')->name('admin.dashboard');
    });

    Route::prefix('admin/')->controller(CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('categories');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category/save', 'store')->name('category.save');
        Route::get('category/edit/{id}', 'edit')->name('category.edit');
        Route::put('category/update/{id}', 'update')->name('category.update');
        Route::get('category/delete/{id}', 'destroy')->name('category.delete');
    });

    Route::prefix('admin/')->controller(ProductController::class)->group(function () {
        Route::get('product', 'index')->name('products');
        Route::get('product/create', 'create')->name('product.create');
        Route::post('product/save', 'store')->name('product.save');
        Route::get('product/edit/{id}', 'edit')->name('product.edit');
        Route::put('product/update/{id}', 'update')->name('product.update');
        Route::get('product/delete/{id}', 'destroy')->name('product.delete');
    });
});

Route::middleware(['web', 'auth', 'staff'])->group(function () {
    Route::prefix('staff/')->controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'staffdashboard')->name('staff.dashboard');
    });
});

Route::middleware(['web', 'auth', 'user'])->group(function () {
    Route::prefix('user/')->controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'userdashboard')->name('user.dashboard');
    });
});
