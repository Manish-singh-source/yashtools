<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CustomersController;

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

Route::middleware('isCustomerAuth:customer')->group(function () {
    Route::get('/', function () {
        return view('user.main');
    })->name('user.dashboard');
    Route::get('/account', function () {
        return view('user.mainorder');
    })->name('user.account');
    Route::get('/customer-logout', [UserController::class, 'logout'])->name('customer.logout');
});






// admin routes: Authentication
Route::get('/admin/signin', function () {
    return view('admin.page-login');
})->name('admin.signin');

Route::get('/admin/signup', function () {
    return view('admin.page-register');
})->name('admin.signup');

Route::post('/register-admin', [UserController::class, 'registerAdminData'])->name('register.admin');
Route::post('/signin-admin', [UserController::class, 'authAdmin'])->name('auth.admin');

Route::middleware('isAdminAuth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/customers-list', [CustomersController::class, 'customersList'])->name('admin.customers.list');
    Route::delete('/delete-customer', [CustomersController::class, 'deleteCustomer'])->name('admin.delete.customer');
    Route::get('/admin-logout', [UserController::class, 'logout'])->name('admin.logout');

    // Customer Routes
    Route::get('/customer-overview/{id}', [CustomersController::class, 'customerOverview'])->name('customer.overview');
    Route::get('/edit-customer/{id}', [CustomersController::class, 'editCustomerDetails'])->name('admin.edit.customer');
    Route::put('/update-customer', [CustomersController::class, 'updateCustomerDetails'])->name('admin.update.customer');

    // Banner Routes
    Route::get('/add-banner', [BannerController::class, 'viewAddBanner'])->name('admin.view.banner');
    Route::post('/add-banner', [BannerController::class, 'addBanner'])->name('admin.add.banner');
    Route::get('/banner-table', [BannerController::class, 'viewBannerTable'])->name('admin.view.banner.table');
    Route::delete('/delete-banner', [BannerController::class, 'deleteBanner'])->name('admin.delete.banner');

    // Categories Routes
    Route::get('/add-category', [CategoriesController::class, 'viewAddCategories'])->name('admin.add.category');
    Route::post('/add-category', [CategoriesController::class, 'addCategory'])->name('admin.add.category');
    Route::get('/category-table', [CategoriesController::class, 'viewCategoryTable'])->name('admin.table.category');
    Route::delete('/delete-category', [CategoriesController::class, 'deleteCategory'])->name('admin.delete.category');
    Route::get('/edit-category/{id}', [CategoriesController::class, 'editCategory'])->name('admin.edit.category');
    Route::put('/update-category', [CategoriesController::class, 'updateCategory'])->name('admin.update.category');
});



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
