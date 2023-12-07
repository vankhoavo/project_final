<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/test', [TestController::class, 'test']);

Route::get('auth/google', [CustomerController::class, 'getGoogleSignInUrl']);
Route::get('/auth/google/callback', [CustomerController::class, 'googleCallback']);

Route::post('/adminlte/login', [AdminController::class, 'actionlogin']);
Route::get('/adminlte/login', [AdminController::class, 'viewlogin']);

Route::group(['prefix' => '/adminlte', 'middleware' => 'admin'], function () {
    Route::get('/admin/index', [AdminController::class, 'index']);
    Route::post('/admin/create', [AdminController::class, 'create']);
    Route::post('/admin/changestatus', [AdminController::class, 'changestatus']);
    Route::post('/admin/update', [AdminController::class, 'update']);
    Route::get('/admin/data', [AdminController::class, 'getdata']);
    Route::get('/logout', [AdminController::class, 'logout']);

    Route::get('/see-order', [InvoiceController::class,'see_order']);
    Route::get('/see-customer', [CustomerController::class,'see_customer']);

    Route::group(['prefix' => '/product-type'], function () {
        Route::get('/index', [ProductTypeController::class, 'index']);
        Route::get('/data', [ProductTypeController::class, 'getdata']);
        Route::post('/create', [ProductTypeController::class, 'create']);
        Route::post('/delete', [ProductTypeController::class, 'destroy']);
        Route::post('/getupdate', [ProductTypeController::class, 'getupdate']);
        Route::post('/update', [ProductTypeController::class, 'update']);
        Route::post('/checkslug', [ProductTypeController::class, 'checkslug']);
    });
    Route::group(['prefix' => '/brand'], function () {
        Route::get('/index', [BrandController::class, 'index']);
        Route::post('/create', [BrandController::class, 'create']);
        Route::post('/getupdate', [BrandController::class, 'getupdate']);
        Route::get('/data', [BrandController::class, 'getdata']);
        Route::post('/checkslug', [BrandController::class, 'checkslug']);
        Route::post('/delete', [BrandController::class, 'destroy']);
        Route::post('/update', [BrandController::class, 'update']);
    });
    Route::group(['prefix' => '/dashboard'], function () {
        Route::get('/index', [\App\Http\Controllers\DashboardController::class, 'viewDashboard']);
        Route::get('/get-total-user', [\App\Http\Controllers\DashboardController::class, 'getTotalUser']);
        Route::get('/get-total-order', [\App\Http\Controllers\DashboardController::class, 'getTotalOrder']);
    });
    Route::group(['prefix' => '/origin'], function () {
        Route::get('/index', [OriginController::class, 'index']);
        Route::post('/create', [OriginController::class, 'store']);
        Route::get('/data', [OriginController::class, 'getdata']);
    });
    Route::group(['prefix' => '/product'], function () {
        Route::get('/index', [ProductController::class, 'index']);
        Route::post('/create', [ProductController::class, 'create']);
        Route::get('/data', [ProductController::class, 'getdata']);
        Route::get('/get', [ProductController::class, 'getData']);
        Route::post('/changestatus', [ProductController::class, 'changestatus']);
        Route::post('/update', [ProductController::class, 'update']);
        Route::post('/getupdate', [ProductController::class, 'getupdate']);
        Route::post('/checkslug', [ProductController::class, 'checkslug']);
        Route::post('/delete', [ProductController::class, 'destroy']);
    });
});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// This is the Client's web route
Route::get('/', [HomePageController::class, 'index']);
Route::get('/get-category', [HomePageController::class, 'getCategory']);
Route::post('/get-product', [HomePageController::class, 'getProduct']);
Route::get('/shoppage1', [HomePageController::class, 'shoppage1']);

Route::get('/get-total-order', [HomePageController::class, 'getTotalOrder']);

Route::get('/register', [HomePageController::class, 'viewregister']);
Route::post('/register', [CustomerController::class, 'actionregister']);

Route::get('/active/{hash}', [CustomerController::class, 'active']);

Route::get('/login', [HomePageController::class, 'viewlogin']);
Route::post('/login', [CustomerController::class, 'actionlogin']);
Route::get('/logout', [CustomerController::class, 'logout']);

Route::get('/forgotpassword', [CustomerController::class, 'viewforgotpassword']);
Route::post('/forgotpassword', [CustomerController::class, 'actionforgotpassword']);

Route::get('/changepassword/{hash}', [CustomerController::class, 'viewchangepassword']);
Route::post('/changepassword', [CustomerController::class, 'actionchangepassword']);

Route::get('/cart', [HomePageController::class, 'cart']);
Route::post('/add-to-cart', [InvoiceDetailController::class, 'addtocart']);
Route::get('/cart/data', [InvoiceDetailController::class, 'data']);
Route::post('/cart/update', [InvoiceDetailController::class, 'updatecard']);

Route::get('/data', [InvoiceController::class, 'getdata']);
Route::post('/create-bill', [InvoiceController::class, 'createbill']);

Route::get('/myinvoice', [InvoiceController::class, 'myinvoice']);
Route::get('/dataleft', [InvoiceController::class, 'getdata']);
Route::get('/dataright/{id}', [InvoiceController::class, 'getdatamodal']);

Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

Route::get('/product/{slug}', [ProductController::class, 'showdetailproduct']);

Route::get('/viewprofile', [HomePageController::class, 'viewprofile']);
Route::get('/get-user', [HomePageController::class, 'getUser']);
Route::post('/updateviewprofile', [HomePageController::class, 'updateviewprofile']);
Route::post('/add-to-cart-by-quantity', [InvoiceDetailController::class, 'addtocartByQuantity']);
