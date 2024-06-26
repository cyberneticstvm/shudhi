<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WardController;
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
        Route::get('/user/login', 'login')->name('login');
        Route::get('/shudhiwmsorg', 'home')->name('home');
        Route::get('/index', 'index')->name('index');
        Route::post('/login', 'authenticate')->name('authenticate');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'signup')->name('signup');
        Route::get('/', 'adminlogin')->name('admin.login');
    });
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::prefix('/')->controller(AdminController::class)->group(function () {
        Route::get('ajax/ddl/{id}/{type}', 'getDdlData')->name('get.ddl.data');
        Route::get('account', 'account')->name('account');
        Route::get('logout', 'logout')->name('logout');
    });
});

Route::middleware(['web', 'auth', 'admin'])->group(function () {

    Route::prefix('admin/report/')->controller(ReportController::class)->group(function () {
        Route::get('staff/feedback', 'staffFeedback')->name('admin.report.staff.feedback');
        Route::post('staff/feedback', 'getStaffFeedback')->name('admin.report.staff.feedback.fetch');
        Route::get('staff/geo/taging', 'geoTagging')->name('admin.report.geo.tagging');
        Route::post('staff/geo/taging', 'getGeoTagging')->name('admin.report.geo.tagging.fetch');
    });


    Route::prefix('admin/')->controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'admindashboard')->name('admin.dashboard');

        Route::get('districts', 'districts')->name('districts');
        Route::get('local-bodies', 'localbodies')->name('lbs');
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

    Route::prefix('admin/')->controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('users');
        Route::get('user/create', 'create')->name('user.create');
        Route::post('user/save', 'store')->name('user.save');
        Route::get('user/edit/{id}', 'edit')->name('user.edit');
        Route::put('user/update/{id}', 'update')->name('user.update');
        Route::get('user/delete/{id}', 'destroy')->name('user.delete');
    });

    Route::prefix('admin/')->controller(WardController::class)->group(function () {
        Route::get('wards', 'index')->name('wards');
        Route::get('ward/create', 'create')->name('ward.create');
        Route::post('ward/save', 'store')->name('ward.save');
        Route::get('ward/edit/{id}', 'edit')->name('ward.edit');
        Route::put('ward/update/{id}', 'update')->name('ward.update');
        Route::get('ward/delete/{id}', 'destroy')->name('ward.delete');
    });
});

Route::middleware(['web', 'auth', 'staff'])->group(function () {
    Route::prefix('staff/')->controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'staffdashboard')->name('staff.dashboard');
        Route::post('account/{id}', 'userselfupdate')->name('staff.self.update');
        Route::get('geo/tagging/list', 'geotagginglist')->name('staff.geo.tagging.list');
        Route::get('geo/tagging', 'geotagging')->name('staff.geo.tagging');
        Route::post('geo/tagging', 'geotaggingsave')->name('staff.geo.tagging.save');
        Route::get('feedback', 'stafffeedback')->name('staff.feedback');
        Route::post('feedback', 'stafffeedbacksave')->name('staff.feedback.save');
    });
});

Route::middleware(['web', 'auth', 'user'])->group(function () {
    Route::prefix('user/')->controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'userdashboard')->name('user.dashboard');
        Route::get('feedback', 'feedback')->name('user.feedback');
        Route::post('feedback', 'feedbacksave')->name('user.feedback.save');
        Route::post('account/{id}', 'userselfupdate')->name('user.self.update');
    });
});
