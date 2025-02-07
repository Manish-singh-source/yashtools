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

Route::get('/banner-table', function () {
    return view('admin.Banner-table');
})->name('admin.banner.table');

Route::get('/edit-banner', function () {
    return view('admin.edit-banner');
})->name('admin.edit.banner');

Route::get('/add-category', function () {
    return view('admin.add-category');
})->name('admin.add.category');

Route::get('/category-table', function () {
    return view('admin.category-table');
})->name('admin.category.table');

Route::get('/edit-category', function () {
    return view('admin.edit-category');
})->name('admin.edit.category');

Route::get('/add-sub-category', function () {
    return view('admin.add-sub-category');
})->name('admin.add.sub.category');

Route::get('/sub-category-table', function () {
    return view('admin.sub-category-table');
})->name('admin.sub.category.table');

Route::get('/edit-sub-category', function () {
    return view('admin.edit-sub-category');
})->name('admin.edit.sub.category');

Route::get('/add-brand', function () {
    return view('admin.add-brand');
})->name('admin.add.brand');

Route::get('/brand-table', function () {
    return view('admin.brand-table');
})->name('admin.brand.table');

Route::get('/edit-brand', function () {
    return view('admin.edit-brand');
})->name('admin.edit.brand');

Route::get('/add-product', function () {
    return view('admin.add-product');
})->name('admin.add.product');

Route::get('/product-table', function () {
    return view('admin.product-table');
})->name('admin.product.table');

Route::get('/product-details', function () {
    return view('admin.product-details');
})->name('admin.product.details');

Route::get('/edit-product', function () {
    return view('admin.edit-product');
})->name('admin.edit.product');

Route::get('/order', function () {
    return view('admin.order');
})->name('admin.order');

Route::get('/order-details', function () {
    return view('admin.order-details');
})->name('admin.order.details');

Route::get('/edit-customer', function () {
    return view('admin.edit-customer');
})->name('admin.edit.customer');

Route::get('/add-event', function () {
    return view('admin.add-event');
})->name('admin.add.event');

Route::get('/event-table', function () {
    return view('admin.event-table');
})->name('admin.event.table');

Route::get('/edit-event', function () {
    return view('admin.edit-event');
})->name('admin.edit.event');

Route::get('/multi-admin', function () {
    return view('admin.multi-admin');
})->name('admin.multi.admin');

Route::get('/edit-admin', function () {
    return view('admin.edit-admin');
})->name('admin.edit.admin');