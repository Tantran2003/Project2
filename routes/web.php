<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Interface\HomeController;
use App\Http\Controllers\Interface\SecureController;
use App\Http\Controllers\Interface\TourlistController; 



//index chinh
Route::get("/", [HomeController::class, 'index'])->name("gd.home");
// danh sach tour
Route::get("/tour-list/{key}", [TourlistController::class, 'index'])->name("gd.index_tour");
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


});
