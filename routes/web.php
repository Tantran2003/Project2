<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Interface\HomeController;
use App\Http\Controllers\Interface\SecureController;
use App\Http\Controllers\Interface\TourlistController; 
use App\Http\Controllers\Interface\DetailsController;
use App\http\Controllers\Interface\CommentsController;
use App\http\Controllers\Admin\ScheduleController;

//index chinh
Route::get("/", [HomeController::class, 'index'])->name("gd.home");
// danh sach tour
Route::get("/tour-list/{key}", [TourlistController::class, 'index'])->name("gd.index_tour");
//details
Route::get("/details/{key}/{dateStart?}", [DetailsController::class, 'index'])->name("gd.details_tour");
//comments
Route::get("/comments", [CommentsController::class, 'index'])->name ('gd.comments');
//search
Route::get("/search/{key?}", [HomeController::class, 'search'])->name("gd.search"); //{key?} ? la nhap gi cung dc
// Route::post('/autocomplete-ajax','HomeController@autocomplete_ajax');
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
Route::prefix("system")->group(function () {
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
//schedule
Route::get("/schedule", [ScheduleController::class, 'schedule'])->name('ht.schedule');
Route::match(['get', 'post'], '/schedule/add', [ScheduleController::class, 'add'])->name('ht.scheduleadd');
Route::match(['get', 'post'], '/schedule/update/{key}', [ScheduleController::class, 'update'])->name('ht.scheduleupdate');
Route::get('/schedule/delete/{key}', [ScheduleController::class, 'delete'])->name('ht.scheduledelete');

});
