<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\XuatXuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/adminlte'], function () {
    Route::group(['prefix' => '/product-type'], function () {
        Route::get('/data', [ProductTypeController::class, 'getdata']);
    });
    Route::group(['prefix' => '/brand'], function () {
        Route::get('/data', [BrandController::class, 'getdata']);
    });
    Route::group(['prefix' => '/xuat-xu'], function () {
        Route::get('/data', [XuatXuController::class, 'getdata']);
    });
    Route::group(['prefix' => '/product'], function () {
        Route::get('/data', [ProductController::class, 'getdata']);
    });
    Route::group(['prefix' => '/admin'], function () {
        Route::get('/data', [AdminController::class, 'getdata']);
    });
});
