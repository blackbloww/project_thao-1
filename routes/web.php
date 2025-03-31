<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MakerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\Product\ProductController as UserProductController;
use App\Http\Controllers\User\Cart\CartController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [UsersController::class, 'index']);
Route::post('/store-customer', [AuthController::class, 'store'])->name('store');

Route::get('/link/{id}', [UsersController::class, 'link'])->name('dk');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'index_login'])->name('index_login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/change-password', [AuthController::class, 'showChangePasswordForm'])->name('customer.change_password');
Route::post('/customer/change-password', [AuthController::class, 'changePassword'])->name('customer.change_password.post');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('layout.app');
    })->name('admin');
});


/**meker */
Route::get('/maker', [MakerController::class, 'index'])->name('maker.index');
Route::delete('/maker/{id}', [MakerController::class, 'destroy'])->name('maker.destroy');
Route::get('/makers/{id}/edit', [MakerController::class, 'edit'])->name('maker.edit');
Route::put('/makers/{id}', [MakerController::class, 'update'])->name('maker.update');
Route::get('/maker/create', [MakerController::class, 'create'])->name('maker.create');
Route::post('/maker/create', [MakerController::class, 'store'])->name('maker.store');
/**category */
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/categorys/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/categorys/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');


/* product */

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');



// // Route delete
// Route::delete('/productclass/{id}', [ProductClassController::class, 'destroy'])->name('productclass.destroy');
// Route::get('/productclass/search', [ProductClassController::class, 'search'])->name('productclass.search');

Route::get('/productclass/edit/{id}', [ProductClassController::class, 'edit'])->name('productclass.edit');
Route::put('/productclass/{id}', [ProductClassController::class, 'update'])->name('productclass.update');
Route::delete('/productclass/{id}', [ProductClassController::class, 'destroy'])->name('productclass.destroy');
Route::get('/productclass/search', [ProductClassController::class, 'search'])->name('productclass.search');

/* trang chủ*/
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/products', [UserProductController::class, 'index'])->name('xxx');
Route::get('/cart', [CartController::class, 'index'])->name('xxx');
