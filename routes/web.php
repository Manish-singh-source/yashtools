<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\FetchAPIs;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EnvoiceController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\EnquiryOrdersController;
use App\Http\Controllers\User\UserShopController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Admin\SubCategoryController;

// user contact related routes
Route::post('/newsletter', [EmailController::class, 'sendNewsletter'])->name('Newsletter.store');
Route::get('send-email', [EmailController::class, 'sendEmail']);
Route::get('contact', [EmailController::class, 'contactForm'])->name('user.contact.us');
Route::post('contact', [EmailController::class, 'sendContactEmail'])->name('user.contact.store');


// user routes: Authentication 
Route::get('/signin', [UserController::class, 'signinView'])->name('signin');
Route::get('/signup', [UserController::class, 'signupView'])->name('signup');
Route::post('/register-user', [UserController::class, 'registerData'])->name('register.user');
Route::post('/signin-user', [UserController::class, 'authUser'])->name('auth.user')->middleware('throttle:3,1');

// User/admin/superadmin Forgot Password
Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('user.forgot.password');
Route::get('/admin-forgot-password', [AdminController::class, 'adminForgotPassword'])->name('admin.forgot.password');
Route::post('/forgot-password', [UserController::class, 'sendResetLink'])->name('user.reset.pass.link');
Route::get('/reset-password', [UserController::class, 'resetPassword'])->name('password.reset');
Route::post('/update-password', [UserController::class, 'updatePassword'])->name('password.update');


// User Normal Pages
Route::get('/privacy-policy', [HomeController::class, 'privacypolicy'])->name('privacy.policy');
Route::get('/terms-conditions', [HomeController::class, 'termsconditions'])->name('terms.conditions');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/feedback', [EmailController::class, 'feedback'])->name('feedback');
Route::post('feedback', [EmailController::class, 'sendFeedbackEmail'])->name('user.feedback.store');
Route::get('/about-us',  [HomeController::class, 'aboutUs'])->name('user.about.us');

// user routes: pages
Route::get('/', [HomeController::class, 'homeView'])->name('user.home');
Route::get('/shop/{category?}', [HomeController::class, 'shopView'])->name('user.shop');
Route::get('/shop-api', [HomeController::class, 'shopViewAPI'])->name('user.shop.api');
Route::get('/shop-api-category-filter', [HomeController::class, 'subCategoriesFilter']);
Route::get('/single-product/{slug}', [HomeController::class, 'singleProductView'])->name('user.single.product');
Route::get('/cart', function () {
    return view('user.cart');
})->name('user.cart');
Route::get('/events', [HomeController::class, 'events'])->name('user.event');;




Route::middleware('isCustomerAuth:customer')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.main');
    })->name('user.dashboard');

    Route::get('/product-categories', [UserShopController::class, 'productShop'])->name('user.product.category');
    Route::get('/maincart', [CartController::class, 'viewCartItems'])->name('user.maincart');
    Route::get('/favourites', [FavouritesController::class, 'favouriteItems'])->name('user.favourites');
    Route::get('/account', [UserProfileController::class, 'userProfile'])->name('user.account');
    Route::get('/orders', [EnvoiceController::class, 'ordersList'])->middleware('web');
    Route::post('/update-account', [UserProfileController::class, 'updateProfile'])->name('user.update.account');
    Route::get('/product-detail-info/{slug}', [UserShopController::class, 'productDetails'])->name('user.product.details');
    Route::get('/customer-logout', [UserController::class, 'logout'])->name('customer.logout');
    Route::post('/add-enquiry', [EnquiryOrdersController::class, 'addEnquiry'])->name('add.enquiry');
    Route::post('/add-to-cart', [CartController::class, 'addCart'])->name('add.cart');
    Route::post('/remove-cart-item', [CartController::class, 'removeCartItem'])->name('remove.cart.item');
    Route::post('/remove-all-cart-item', [CartController::class, 'allRemoveCartItems'])->name('remove.all.cart.item');

    // Add to Cart Through API 
    Route::post('/add-to-favourite', [FetchAPIs::class, 'addToFav'])->middleware('web');
    Route::post('/remove-from-favourite', [FetchAPIs::class, 'removeFromFav'])->middleware('web');

    // Enquiry 
    Route::get('/product-info/{id}', [EnquiryOrdersController::class, 'productInfo'])->name('product.info');
    Route::put('/update-user-password', [UserController::class, 'updateUserPassword'])->name('update.user.password');
});

Route::get('/check-auth', function () {
    return response()->json(['isAuthenticated' => Auth::check()]);
});





// admin routes: Authentication
Route::get('/admin/signin', function () {
    return view('admin.page-login');
})->name('admin.signin');

Route::get('/admin/signup', function () {
    return view('admin.page-register');
})->name('admin.signup');
Route::post('/register-admin', [UserController::class, 'registerAdminData'])->name('register.admin');
Route::post('/signin-admin', [UserController::class, 'authAdmin'])->name('auth.admin')->middleware('throttle:3,1');


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
    Route::get('/edit-banner/{slug}', [BannerController::class, 'editBanner'])->name('admin.edit.banner');
    Route::put('/update-banner', [BannerController::class, 'updateBanner'])->name('admin.update.banner');

    // Categories Routes
    Route::get('/add-category', [CategoriesController::class, 'viewAddCategories'])->name('admin.add.category');
    Route::post('/add-category', [CategoriesController::class, 'addCategory'])->name('admin.add.category');
    Route::get('/category-table', [CategoriesController::class, 'viewCategoryTable'])->name('admin.table.category');
    Route::delete('/delete-category', [CategoriesController::class, 'deleteCategory'])->name('admin.delete.category');
    Route::get('/edit-category/{slug}', [CategoriesController::class, 'editCategory'])->name('admin.edit.category');
    Route::put('/update-category', [CategoriesController::class, 'updateCategory'])->name('admin.update.category');


    // Sub Categories Routes
    Route::get('/add-sub-category', [SubCategoryController::class, 'viewAddSubCategories'])->name('admin.view.subcategory');
    Route::post('/add-sub-category', [SubCategoryController::class, 'addSubCategory'])->name('admin.add.subcategory');
    Route::get('/sub-category-table', [SubCategoryController::class, 'viewSubCategoryTable'])->name('admin.table.subcategory');
    Route::delete('/delete-sub-category', [SubCategoryController::class, 'deleteSubCategory'])->name('admin.delete.subcategory');
    Route::get('/edit-sub-category/{slug}', [SubCategoryController::class, 'editSubCategory'])->name('admin.edit.subcategory');
    Route::put('/update-sub-category', [SubCategoryController::class, 'updateSubCategory'])->name('admin.update.subcategory');

    // Brands Routes
    Route::get('/add-brand', [BrandController::class, 'viewAddBrand'])->name('admin.view.brand');
    Route::post('/add-brand', [BrandController::class, 'addBrand'])->name('admin.add.brand');
    Route::get('/brand-table', [BrandController::class, 'viewBrandTable'])->name('admin.table.brand');
    Route::delete('/delete-brand', [BrandController::class, 'deleteBrand'])->name('admin.delete.brand');
    Route::get('/edit-brand/{slug}', [BrandController::class, 'editBrand'])->name('admin.edit.brand');
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
    Route::get('/edit-admin/{slug}', [AdminController::class, 'editAdmin'])->name('admin.edit.admin');
    Route::delete('/delete-admin', [AdminController::class, 'deleteAdmin'])->name('delete.admin');
    Route::put('/update-admin', [AdminController::class, 'updateAdmin'])->name('admin.update.admin');

    // Products Routes
    Route::get('/add-product', [ProductsController::class, 'viewProduct'])->name('admin.view.product');
    Route::post('/add-product', [ProductsController::class, 'addProducts'])->name('admin.add.product');
    Route::get('/product-table', [ProductsController::class, 'viewProductTable'])->name('admin.table.product');
    Route::delete('/delete-product', [ProductsController::class, 'deleteProduct'])->name('admin.delete.product');
    Route::get('/edit-product/{slug}', [ProductsController::class, 'editProduct'])->name('admin.edit.product');
    Route::put('/update-product', [ProductsController::class, 'updateProduct'])->name('admin.update.product');

    Route::get('/product-detail/{slug}', [ProductsController::class, 'detailProduct'])->name('admin.product.details');
    Route::post('/fetch-sub-categories', [FetchAPIs::class, 'fetchSubCategories'])->name('admin.fetch.sub.categories')->middleware('web');

    // Toggle Status
    Route::post('/toggle-banner-table', [FetchAPIs::class, 'toggleBannerStatus'])->middleware('web');
    Route::post('/toggle-product-table', [FetchAPIs::class, 'toggleProductStatus'])->middleware('web');
    Route::post('/toggle-customers-list', [FetchAPIs::class, 'toggleStatusCustomer'])->middleware('web');

    // Delete Multiple Selected
    Route::post('/delete-banner-table', [FetchAPIs::class, 'deleteSelected'])->middleware('web');
    Route::post('/delete-category-table', [FetchAPIs::class, 'deleteSelectedCategories'])->middleware('web');
    Route::post('/delete-sub-category-table', [FetchAPIs::class, 'deleteSelectedSubCategories'])->middleware('web');
    Route::post('/delete-brand-table', [FetchAPIs::class, 'deleteSelectedBrands'])->middleware('web');
    Route::post('/delete-event-table', [FetchAPIs::class, 'deleteSelectedEvents'])->middleware('web');
    Route::post('/delete-product-table', [FetchAPIs::class, 'deleteSelectedProducts'])->middleware('web');
    Route::post('/delete-customers-list', [FetchAPIs::class, 'deleteSelectedCustomers'])->middleware('web');
    Route::post('/delete-order', [FetchAPIs::class, 'deleteSelectedOrder'])->middleware('web');
    Route::post('/delete-multi-admin', [FetchAPIs::class, 'deleteSelectedMultiAdmin'])->middleware('web');

    // Invoice Routes
    Route::post('/add-invoice-details', [EnvoiceController::class, 'addInvoice'])->name('add.invoice');
    Route::put('/update-invoice-details', [EnvoiceController::class, 'updateInvoice'])->name('update.invoice');

    // Profile Routes
    Route::get('/profile', [AdminController::class, 'profileView'])->name('admin.profile');
    Route::post('/update-profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');

    // Enquiry Orders
    Route::get('/order', [EnquiryOrdersController::class, 'showOrders'])->name('admin.order');
    Route::get('/order-details/{id}/{invoice_id?}', [EnquiryOrdersController::class, 'showOrderDetails'])->name('admin.order.details');
    Route::post('/get-data-between-dates', [EnquiryOrdersController::class, 'getEnquiriesBetweenDates'])->middleware('web');

    // Add to Cart Through API 
    Route::post('/order-status', [FetchAPIs::class, 'changeOrderStatus'])->middleware('web');
});
