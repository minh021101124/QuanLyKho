<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\KhoController;
use App\Http\Controllers\Admin\NhapController;
use App\Http\Controllers\Admin\XuatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeControllerr;
use Illuminate\Support\Facades\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

//đăng nhập quản trị
// Route::prefix('admin')->middleware('auth')->group(function () {
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('detail/{slug}', [HomeController::class, 'detail'])->name('detail');
    Route::get('category-product/{cat}', [HomeController::class, 'category'])->name('product.sanpham');
    //Danh mục sản phẩm
    Route::resource('category', CategoryController::class);
    Route::get('/category-trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/category/{id}/forceDelete', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    //Sản phẩm
    Route::resource('product', ProductController::class);
    Route::get('/product-trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::get('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('/product/{id}/forceDelete', [ProductController::class, 'forceDelete'])->name('product.forceDelete');
    Route::put('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/deleteimagepro/{id}', [ProductController::class, 'deleteimagepro'])->name('deleteimagepro');
    Route::get('/product/{productId}', 'ProductController@show')->name('product.detail');
    //Kho hàng
    Route::resource('kho', KhoController::class);
    Route::get('/khohang', [KhoController::class, 'index'])->name('khohang.index');
    //Nhập hàng
    Route::resource('nhaphanghoa', NhapController::class);
    Route::get('/nhaphang', [NhapController::class, 'nhaphang'])->name('nhap.index');
    Route::get('/danh-sach-nhap', [NhapController::class, 'dsnhap'])->name('nhap.list');
    Route::get('/admin/tao-don-nhap/{id}', [NhapController::class, 'taodon'])->name('nhap.donhang');
    //Xuất hàng
    Route::resource('xuathanghoa', XuatController::class);
    Route::get('/xuathang', [XuatController::class, 'xuathang'])->name('xuat.index');
    Route::get('/danh-sach-xuat', [XuatController::class, 'dsxuat'])->name('xuat.list');
    Route::get('/admin/tao-don-xuat/{id}', [XuatController::class, 'taodon'])->name('xuat.donhang');

    Route::get('/them/{id}', [NhapController::class, 'them'])->name('nhap.them');
    // Route::get('/sanpham/{id}',[ProductController::class,'sanpham'])->name('product.sanpham');
    // Route::get('detail/{slug}', [HomeController::class, 'detail'])->name('detail');
    Route::get('sanpham/{slug}', [ProductController::class, 'ctsanpham'])->name('product.sanpham');

    Route::get('doanhthu', [ProductController::class, 'doanhthu'])->name('thongke.doanhthu');


});



Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');


});
// Route::get('/home', [HomeController::class, 'index']);
// Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/change', [AuthController::class, 'change'])->name('change');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
});
Route::get('/export-invoice', [ProductController::class, 'exportInvoice'])->name('export.invoice');

Route::get('/product-price/{id}', [ProductController::class, 'getProductPrice']);