<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\LangController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

// ==================================  Company   ==================================
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->name('add.product');
Route::post('/products/create', [ProductController::class, 'store'])->name('create.product');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('update.product');
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('delete.product');

// ==================================  Category   ==================================
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/create', [CategoryController::class, 'create'])->name('add.category');
Route::post('/category/create', [CategoryController::class, 'store'])->name('create.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('update.category');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

});