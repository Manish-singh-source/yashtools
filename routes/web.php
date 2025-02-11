<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FetchAPIs;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SubCategoryController;

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


// Admin and Super Admin Routes 
Route::middleware(AdminAuthMiddleware::class . ':admin,superadmin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'viewDashboard'])->name('admin.dashboard');
    Route::get('/customers-list', [CustomersController::class, 'customersList'])->name('admin.customers.list');
    Route::delete('/delete-customer', [CustomersController::class, 'deleteCustomer'])->name('admin.delete.customer');
    Route::get('/admin-logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::put('/update-password', [AdminController::class, 'updatePassword'])->name('update.password');

    // Customer Routes
    Route::get('/customer-overview/{id}', [CustomersController::class, 'customerOverview'])->name('customer.overview');
    Route::get('/edit-customer/{id}', [CustomersController::class, 'editCustomerDetails'])->name('admin.edit.customer');
    Route::put('/update-customer', [CustomersController::class, 'updateCustomerDetails'])->name('admin.update.customer');

    // Banner Routes
    Route::get('/add-banner', [BannerController::class, 'viewAddBanner'])->name('admin.view.banner');
    Route::post('/add-banner', [BannerController::class, 'addBanner'])->name('admin.add.banner');
    Route::get('/banner-table', [BannerController::class, 'viewBannerTable'])->name('admin.view.banner.table');
    Route::delete('/delete-banner', [BannerController::class, 'deleteBanner'])->name('admin.delete.banner');
    Route::get('/edit-banner/{id}', [BannerController::class, 'editBanner'])->name('admin.edit.banner');
    Route::put('/update-banner', [BannerController::class, 'updateBanner'])->name('admin.update.banner');

    // Categories Routes
    Route::get('/add-category', [CategoriesController::class, 'viewAddCategories'])->name('admin.add.category');
    Route::post('/add-category', [CategoriesController::class, 'addCategory'])->name('admin.add.category');
    Route::get('/category-table', [CategoriesController::class, 'viewCategoryTable'])->name('admin.table.category');
    Route::delete('/delete-category', [CategoriesController::class, 'deleteCategory'])->name('admin.delete.category');
    Route::get('/edit-category/{id}', [CategoriesController::class, 'editCategory'])->name('admin.edit.category');
    Route::put('/update-category', [CategoriesController::class, 'updateCategory'])->name('admin.update.category');


    // Sub Categories Routes
    Route::get('/add-sub-category', [SubCategoryController::class, 'viewAddSubCategories'])->name('admin.view.subcategory');
    Route::post('/add-sub-category', [SubCategoryController::class, 'addSubCategory'])->name('admin.add.subcategory');
    Route::get('/sub-category-table', [SubCategoryController::class, 'viewSubCategoryTable'])->name('admin.table.subcategory');
    Route::delete('/delete-sub-category', [SubCategoryController::class, 'deleteSubCategory'])->name('admin.delete.subcategory');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'editSubCategory'])->name('admin.edit.subcategory');
    Route::put('/update-sub-category', [SubCategoryController::class, 'updateSubCategory'])->name('admin.update.subcategory');

    // Brands Routes
    Route::get('/add-brand', [BrandController::class, 'viewAddBrand'])->name('admin.view.brand');
    Route::post('/add-brand', [BrandController::class, 'addBrand'])->name('admin.add.brand');
    Route::get('/brand-table', [BrandController::class, 'viewBrandTable'])->name('admin.table.brand');
    Route::delete('/delete-brand', [BrandController::class, 'deleteBrand'])->name('admin.delete.brand');
    Route::get('/edit-brand/{id}', [BrandController::class, 'editBrand'])->name('admin.edit.brand');
    Route::put('/update-brand', [BrandController::class, 'updateBrand'])->name('admin.update.brand');


    // Events Routes
    Route::get('/add-event', [EventController::class, 'viewEvent'])->name('admin.view.event');
    Route::post('/add-event', [EventController::class, 'addEvent'])->name('admin.add.event');
    Route::get('/event-table', [EventController::class, 'viewEventTable'])->name('admin.table.event');
    Route::delete('/delete-event', [EventController::class, 'deleteEvent'])->name('admin.delete.event');
    Route::get('/edit-event/{id}', [EventController::class, 'editEvent'])->name('admin.edit.event');
    Route::put('/update-event', [EventController::class, 'updateEvent'])->name('admin.update.event');


    // Multi Admin Routes
    Route::get('/multi-admin', [AdminController::class, 'viewAdmin'])->name('admin.view.multi.admin');
    Route::post('/add-admin', [AdminController::class, 'addAdmin'])->name('add.admin');
    Route::get('/edit-admin/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit.admin');
    Route::delete('/delete-admin', [AdminController::class, 'deleteAdmin'])->name('delete.admin');
    Route::put('/update-admin', [AdminController::class, 'updateAdmin'])->name('admin.update.admin');

    // Products Routes
    Route::get('/add-product', [ProductsController::class, 'viewProduct'])->name('admin.view.product');
    Route::post('/add-product', [ProductsController::class, 'addProducts'])->name('admin.add.product');
    Route::get('/event-product', [ProductsController::class, 'viewProductTable'])->name('admin.table.product');
    Route::delete('/delete-product', [ProductsController::class, 'deleteProduct'])->name('admin.delete.product');
    Route::get('/edit-product/{id}', [ProductsController::class, 'editProduct'])->name('admin.edit.product');
    Route::put('/update-product', [ProductsController::class, 'updateProduct'])->name('admin.update.product');

    Route::get('/product-details/{id}', [ProductsController::class, 'detailProduct'])->name('admin.product.details');
    Route::post('/fetch-sub-categories', [FetchAPIs::class, 'fetchSubCategories'])->name('admin.fetch.sub.categories')->middleware('web');

    // Profile Routes
    Route::get('/profile', [AdminController::class, 'profileView'])->name('admin.profile');
    Route::post('/update-profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
});


Route::get('/order', function () {
    return view('admin.order');
})->name('admin.order');

Route::get('/order-details', function () {
    return view('admin.order-details');
})->name('admin.order.details');
