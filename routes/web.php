<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\OriginController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('auth/github', function () {
    return Socialite::driver('github')->redirect();
});
Route::get('auth/github/callback', function () {
    $user = Socialite::driver('github')->user();
    dd($user);
    echo $user->email . '<br/>';
    echo $user->name . '<br/>';
    echo $user->getAvatar();
});

Route::get('/test', [TestController::class, 'test']);

Route::get('/adminlte/admin/index', [AdminController::class, 'index']);
Route::post('/adminlte/admin/create', [AdminController::class, 'create']);
Route::post('/adminlte/admin/changestatus', [AdminController::class, 'changestatus']);
Route::post('/adminlte/admin/update', [AdminController::class, 'update']);

Route::post('/adminlte/login', [AdminController::class, 'actionlogin']);
Route::get('/adminlte/login', [AdminController::class, 'viewlogin']);

Route::group(['prefix' => '/adminlte', 'middleware' => 'admin'], function () {
    // Route::group(['prefix' => '/adminlte'], function () {
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::group(['prefix' => '/product-type'], function () {
        Route::get('/index', [ProductTypeController::class, 'index']);
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
        Route::post('/checkslug', [BrandController::class, 'checkslug']);
        Route::post('/delete', [BrandController::class, 'destroy']);
        Route::post('/update', [BrandController::class, 'update']);
    });
    Route::group(['prefix' => '/origin'], function () {
        Route::get('/index', [OriginController::class, 'index']);
        Route::post('/create', [OriginController::class, 'store']);
        Route::get('/data', [OriginController::class, 'getdata']);
    });
    Route::group(['prefix' => '/product'], function () {
        Route::get('/index', [ProductController::class, 'index']);
        Route::post('/create', [ProductController::class, 'create']);
        Route::get('/get', [ProductController::class, 'getData']);
        Route::post('/changestatus', [ProductController::class, 'changestatus']);
        Route::post('/update', [ProductController::class, 'update']);
        Route::post('/getupdate', [ProductController::class, 'getupdate']);
        Route::post('/checkslug', [ProductController::class, 'checkslug']);
        Route::post('/delete', [ProductController::class, 'destroy']);
    });
    Route::group(['prefix' => '/warehouse'], function () {
        Route::get('/index', [WarehouseController::class, 'index']);
        Route::get('/listwarehouse', [WarehouseController::class, 'listwarehouse']);
        Route::post('/search', [WarehouseController::class, 'searchproduct']);
        Route::get('/data', [WarehouseController::class, 'getdata']);
        Route::post('/create', [WarehouseController::class, 'store']);
        Route::post('/delete', [WarehouseController::class, 'destroy']);
        Route::post('/update', [WarehouseController::class, 'update']);
        Route::get('/create', [WarehouseController::class, 'storewarehouse']);
        Route::post('/detailwarehouse', [WarehouseController::class, 'detailwarehouse']);
    });
});

Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// This is the Client's web route
Route::get('/', [HomePageController::class, 'index']);

Route::get('/login', [HomePageController::class, 'viewlogin']);
Route::post('/login', [CustomerController::class, 'actionlogin']);
Route::get('/active/{hash}', [CustomerController::class, 'active']);

Route::get('/register', [HomePageController::class, 'viewregister']);
Route::post('/register', [CustomerController::class, 'actionregister']);
