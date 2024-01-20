<?php

use App\Http\Controllers\AdminScheduleController;
use App\Http\Middleware\Decentralization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\LoginAdminController;

use App\Http\Controllers\Interface\HomeController;
use App\Http\Controllers\Interface\SecureController;
use App\Http\Controllers\Interface\TourlistController; 
use App\Http\Controllers\Interface\BookingController; 
use App\Http\Controllers\Interface\DetailsController;
use App\Http\Controllers\Interface\CommentsController;

//Checkout
Route::match(['get', 'post'],'/booking/{key}/{name}', [BookingController::class, 'create'])->name('gd.createform');
Route::get("/details/{key}/{name}", [BookingController::class, 'showBookingDetails'])->name("gd.bookingdetail");
Route::match(['put', 'patch'],"/update/{key}/{name}", [BookingController::class, 'updateBooking'])->name("gd.bookingupdate");
//index chinh
Route::get("/", [HomeController::class, 'index'])->name("gd.home");
// danh sach tour
Route::get("/tour-list/{key}", [TourlistController::class, 'index'])->name("gd.index_tour");
//details
Route::get("/details/{key}/{name}", [DetailsController::class, 'index'])->name("gd.details_tour");
//comments {dateStart?}/{dateEnd?}/{tourcode?}
Route::get('/delete/{id}', [DetailsController::class, 'delete'])->name("gd.delete_comments");
//search
Route::post("/search/{key?}", [HomeController::class, 'search'])->name("gd.search"); //{key?} ? la nhap gi cung dc

//filter
Route::get('/filter-products', [TourlistController::class, 'filterProducts'])->name('filter.products');
//login
Route::match(['get','post'],"/login", [SecureController::class, 'login'])->name("gd.login");
Route::get("/logout", [SecureController::class, 'logout'])->name("gd.logout");
Route::match(['get','post'],"/register", [SecureController::class, 'register'])->name("gd.register");
//profile user
Route::get("/profile", [SecureController::class, 'profile'])->name("gd.profile");
Route::get('/edit-profile', [SecureController::class, 'editProfileForm'])->name('gd.editprofile.form');
Route::post('/edit-profile', [SecureController::class, 'editProfile'])->name('gd.editprofile');


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

Route::middleware('Decentralization')->prefix("system")->group(function () {
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
})->middleware(Decentralization::class);
