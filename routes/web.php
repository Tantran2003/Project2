<?php

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

Route::get("/", [HomeController::class, 'index'])->name("gd.home");

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
