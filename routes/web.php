<?php

use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// user routes: Authentication 
Route::get('/signin', function () {
    return view('user.signin');
})->name('signin');
Route::get('/signup', function () {
    return view('user.signup');
})->name('signup');
Route::post('/register-user', [UserController::class, 'registerData'])->name('register.user');
Route::post('/signin-user', [UserController::class, 'authUser'])->name('auth.user');

// user routes: pages
Route::get('/', function () {
    return view('user.main');
})->name('user.dashboard');
Route::get('/admin-logout', [UserController::class, 'adminLogout'])->name('admin.logout');
Route::get('/account', function () {
    return view('user.mainorder');
})->name('user.account');







// admin routes: Authentication
Route::get('/admin/signin', function () {
    return view('admin.page-login');
})->name('admin.signin');

Route::get('/admin/signup', function () {
    return view('admin.page-register');
})->name('admin.signup');

Route::post('/register-admin', [UserController::class, 'registerAdminData'])->name('register.admin');
Route::post('/signin-admin', [UserController::class, 'authAdmin'])->name('auth.admin');
Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::get('/customers-list', [CustomersController::class, 'customersList'])->name('admin.customers.list');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// 
Route::get('/add-banner', function () {
    return view('admin.add-banner');
})->name('admin.add.banner');
