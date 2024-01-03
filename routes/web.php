<?php

use App\Http\Controllers\Interface\TourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Interface\HomeController;
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
//Tourdetail
Route::get('/tourdetail/{month}', [TourController::class, 'tourdetail'])->name('gd.tourdetail');
Route::get('/tourdates/{category_id}', 'TourController@tourdates')->name('tourdates');
Route::get('/tourconfirm/{tour_id}', 'TourController@tourconfirm')->name('tourconfirm');

Route::get('/product/{name}/{key}.html',[TourController::class,'tourconfirm'])->name('gd.tourconfirm');

//Homepage
Route::get("/", [HomeController::class, 'index'])->name("gd.home");
Route::get("/packages", [HomeController::class, 'tourpackages'])->name("gd.packages");
Route::get("/about", [HomeController::class, 'about'])->name("gd.about");




Route::prefix("system")->group(function () {
    Route::get("/admin", [AdminController::class, 'index'])->name("ht.admin");
    //routes category
    Route::get("/tourmonthlist", [CategoryController::class, 'tourmonthlist'])->name("ht.tourmonthlist");
    Route::match(['get', 'post'], '/categorie/addtourmonthlist', [CategoryController::class, 'addtourmonthlist'])->name('ht.addtourmonthlist');
    Route::match(['get', 'post'], '/categorie/updatetourmonthlist/{key}', [CategoryController::class, 'updatetourmonthlist'])->name('ht.updatetourmonthlist');
    Route::get('/categorie/deletetourmonthlist/{key}', [CategoryController::class, 'deletetourmonthlist'])->name('ht.deletetourmonthlist');
    ///routes products
    Route::get("/products", [ProductsController::class, 'products'])->name('ht.products');
    Route::match(['get', 'post'], '/products/add', [ProductsController::class, 'add'])->name('ht.productsadd');
    Route::match(['get', 'post'], '/products/update/{key}', [ProductsController::class, 'update'])->name('ht.productsupdate');
    Route::get('/products/delete/{key}', [ProductsController::class, 'delete'])->name('ht.productsdelete');


});
