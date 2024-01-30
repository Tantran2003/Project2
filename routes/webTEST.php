<?php

use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Middleware\Decentralization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Interface\BlogController;
use App\Http\Controllers\Interface\HomeController;
use App\Http\Controllers\Interface\SecureController;
use App\Http\Controllers\Interface\TourlistController; 
use App\Http\Controllers\Interface\DetailsController;
use App\Http\Controllers\Interface\BookingController;
use App\Http\Controllers\Interface\ContactController;
use App\Http\Controllers\Interface\CheckoutController;

//Guide
Route::get('/guides',[HomeController::class, 'getGuides'])->name('gd.guide');
Route::get('/guide/{id}',[HomeController::class, 'getGuideDetails'])->name('gd.guidedetail');

//Booking
Route::match(['get', 'post'],"/booking",[BookingController::class,'booking'])->name("gd.booking");
Route::get('/tour-booking/{product_id}/{schedule_id}', [BookingController::class, 'booking'])->name('gd.booking');
Route::post('/store-tour-booking/{product_id}/{schedule_id}', [BookingController::class, 'addbooking'])->name('gd.addbooking');
//Total amount
Route::post('/update-total-amount-session', [CheckoutController::class, 'gd.updateTotalAmountSession'])
    ->name('gd.updateTotalAmountSession');
//Checkout-VNPAY
Route::post('/checkoutform',  [CheckoutController::class, 'checkoutform'])->name('gd.checkout');
Route::post('/vnpay_payment',  [CheckoutController::class, 'vnpay_payment'])->name('gd.vnpay');
// Auth::routes(['verify' => true]);
Route::get('/tour-history/list',[BookingController::class, 'tourHistory'])->name('gd.tourhistory');
Route::get('/booking-request/list', [BookingController::class, 'pendingBookingList'])->name('gd.pendingbooking');
Route::post('/booking-request/cancel/{id}',  [BookingController::class, 'cancelBookingRequest'])->name('gd.bookingcancel');

//Index chinh
Route::get("/", [HomeController::class, 'index'])->name("gd.home");
//Tour List
Route::get("/tour-list/{key}", [TourlistController::class, 'index'])->name("gd.index_tour");
//Details
Route::get("/details/{key}/{name}", [DetailsController::class, 'index'])->name("gd.details_tour");
//Comments {dateStart?}/{dateEnd?}/{tourcode?}
Route::get('/delete/{id}', [DetailsController::class, 'delete'])->name("gd.delete_comments");
//Search
Route::post("/search/{key?}", [HomeController::class, 'search'])->name("gd.search"); //{key?} ? la nhap gi cung dc
Route::get("/no-results", [HomeController::class, 'noresults'])->name("gd.noresults");

//Filter
Route::get('/filter-products', [TourlistController::class, 'filterProducts'])->name('filter.products');
//Login
Route::match(['get','post'],"/login", [SecureController::class, 'login'])->name("gd.login");
Route::get("/logout", [SecureController::class, 'logout'])->name("gd.logout");
Route::match(['get','post'],"/register", [SecureController::class, 'register'])->name("gd.register");
//Profile user
Route::get("/profile", [SecureController::class, 'profile'])->name("gd.profile");
Route::get('/edit-profile', [SecureController::class, 'editProfileForm'])->name('gd.editprofile.form');
Route::post('/edit-profile', [SecureController::class, 'editProfile'])->name('gd.editprofile');


//Contact
Route::get('/contact', [ContactController::class, 'index'])->name('gd.contactindex');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'detail'])->name('blog.detail');

//end login
//reset password
Route::get("/forget-password", [SecureController::class, 'forgetPassword'])->name("gd.forget");
Route::post("/forget-password", [SecureController::class, 'forgetPasswordPost'])->name("gd.forgetPost");
Route::get("/reset-password/{token}", [SecureController::class, 'resetPassword'])->name("gd.resetPassword");
Route::post("/reset-password", [SecureController::class, 'resetPasswordPost'])->name("gd.resetPasswordPost");
//end reset password
Route::match(['get','post'],"/save-rating/{id}", [DetailsController::class, 'saveRating'])->name('gd.saveRating');

//login vào admin
Route::prefix('system')->group(function () {
Route::match(['get','post'],"/login", [LoginAdminController::class, 'login'])->name("ht.login");
Route::get("/logout", [LoginAdminController::class, 'logout'])->name("ht.logout");
});
//end login vào admin



////////////////////////////
// Route::middleware('Decentralization')->prefix('system')->group(function () {
    Route::group([ 
        
        'prefix' => 'system', 
        'namespace' => 'Admin', 
        'middleware' => [ 
        'Decentralization'
        ]
    ], function () {
    Route::resource('guides', GuideController::class)->names([
        'index' => 'ht.guideindex',
        'create' => 'ht.guideadd',
        'store' => 'admin.guide.store',
        'show' => 'admin.guide.show',
        'edit' => 'admin.guide.edit',
        'update' => 'admin.guide.update',
        'destroy' => 'admin.guide.destroy',
    ]);
    Route::get('guides/{guide}', [GuideController::class, 'show'])->name('admin.guide.show');
    Route::get('guides/{guide}/edit', [GuideController::class, 'edit'])->name('admin.guide.edit');
    // //Guide
    // Route::get("/products", [GuideController::class, 'index'])->name('ht.products');
    // Route::match(['get', 'post'], '/products/add', [GuideController::class, 'create'])->name('ht.guideadd');
    // Route::match(['get', 'post'], '/products/update/{key}', [GuideController::class, 'update'])->name('ht.guideupdate');
    // Route::get('/products/delete/{key}', [GuideController::class, 'delete'])->name('ht.guidedelete');

    Route::get("/admin", [AdminController::class, 'index'])->name("ht.admin");
    //routes category
    Route::get("/categorie", [CategoryController::class, 'categorie'])->name("ht.categorie");
    Route::match(['get', 'post'], '/categorie/add', [CategoryController::class, 'add'])->name('ht.categorieadd');
    Route::match(['get', 'post'], '/categorie/update/{key}', [CategoryController::class, 'update'])->name('ht.categorieupdate');
    Route::get('/categorie/delete/{key}', [CategoryController::class, 'delete'])->name('ht.categoriedelete');
    ///routes products
    Route::get("/products", [ProductsController::class, 'products'])->name('ht.products');
    Route::match(['get', 'post'], '/products/add', [ProductsController::class, 'add'])->name('ht.productsadd');
    Route::match(['get', 'post'], '/products/update/{key}', [ProductsController::class, 'update'])->name('ht.productsupdate');
    Route::get('/products/delete/{key}', [ProductsController::class, 'delete'])->name('ht.productsdelete');
    Route::get('/viewsproducts/{id}', [ProductsController::class, 'viewdetails'])->name('ht.viewdetails');

    //Schedule
    Route::get("/schedule", [ScheduleController::class, 'schedule'])->name('ht.schedule');
    Route::match(['get', 'post'], '/schedule/add', [ScheduleController::class, 'add'])->name('ht.scheduleadd');
    Route::match(['get', 'post'], '/schedule/update/{key}', [ScheduleController::class, 'update'])->name('ht.scheduleupdate');
    Route::get('/schedule/delete/{key}', [ScheduleController::class, 'delete'])->name('ht.scheduledelete');
    //account
    Route::get("/account", [AccountController::class, 'account'])->name("ht.account");
    Route::match(['get', 'post'], '/account/add', [AccountController::class, 'add'])->name('ht.accountadd');
    Route::match(['get', 'post'], '/account/update/{key}', [AccountController::class, 'update'])->name('ht.accountupdate');
    Route::get('/account/delete/{key}', [AccountController::class, 'delete'])->name('ht.accountdelete');
    //booking
    Route::get('list', [AccountController::class,'adminList'])->name('list');

    Route::get('booking-request/list', [AdminBookingController::class, 'pendingBookingList'])->name('ht.pendingbooking');
    Route::post('booking-request/approve/{id}', [AdminBookingController::class, 'bookingApprove'])->name('ht.bookingapprove');
    Route::post('booking-request/remove/{id}', [AdminBookingController::class, 'bookingRemoveByAdmin'])->name('ht.bookingremove');
    Route::get('running/packages/', [AdminBookingController::class, 'runningPackage'])->name('ht.packagerunning');
    Route::post('running/package/complete/{id}', [AdminBookingController::class, 'runningPackageComplete'])->name('ht.packagerunningcomplete');
    Route::get('tour-history/list', [AdminBookingController::class, 'tourHistory'])->name('ht.tourhistory');
    //guide
    

    // blog
    Route::get('/blog/list', [BlogController::class, 'adminIndex'])->name('blog.admin.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::post('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    
    Route::get('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

    //contact

Route::prefix('admin')->group(function () {
    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('admin.contact.index');
});
});
