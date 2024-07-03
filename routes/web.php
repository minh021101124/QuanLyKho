<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;


//route fe

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('category/{cat}', [HomeController::class, 'category'])->name('fe.category_product');
Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail');
// Route::get('/login', [UserController::class, 'login'])->name('login');
// Route::post('/login', [UserController::class, 'postLogin']);
// Route::get('/register', [UserController::class, 'register'])->name('register');
// Route::post('/register', [UserController::class, 'postRegister']);
// Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/add-cart',[CartController::class,'add'])->name('cart.add');

Route::get('/cart', [CartController::class,'index'])->name('cart.index');

Route::prefix('admin')->middleware('auth')->group(function (){
    

    Route::get('/', [DashBoardController::class, 'index'])->name('admin.index');
    Route::resource('category', CategoryController::class);
    Route::get('/category-trash',[CategoryController::class,'trash'])->name('category.trash');
    Route::get('/category/{id}/restore',[CategoryController::class,'restore'])->name('category.restore');
    Route::get('/category/{id}/forceDelete',[CategoryController::class,'forceDelete'])->name('category.forceDelete');
    Route::resource('product', ProductController::class);
    Route::get('/product-trash',[ProductController::class,'trash'])->name('product.trash');
    Route::get('/product/{id}/restore',[ProductController::class,'restore'])->name('product.restore');
    Route::get('/product/{id}/forceDelete',[ProductController::class,'forceDelete'])->name('product.forceDelete');
    
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
   

});
Route::get('/home', [HomeController::class, 'index']);
Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/change', [AuthController::class, 'change'])->name('change');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
});
