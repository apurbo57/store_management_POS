<?php

use App\Http\Controllers\staff\BrandController;
use App\Http\Controllers\staff\CategoryController;
use App\Http\Controllers\staff\DashboardController;
use App\Http\Controllers\staff\ProductController;
use App\Http\Controllers\staff\sellController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::prefix('/staff')->name('staff.')->middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Brand Route
    ROute::prefix('/brand')->name('brand.')->group(function(){
        Route::get('/index', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [BrandController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [BrandController::class, 'destroy'])->name('destroy');
    });
    //Category Route
    Route::prefix('/category')->name('category.')->group(function(){
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [CategoryController::class, 'destroy'])->name('destroy');
    });
    //product Route
    Route::resource('product', ProductController::class);
    //sell product
    Route::prefix('/sell')->name('sell.')->group(function(){
        Route::get('/sell_product', [sellController::class, 'index'])->name('sell_product');
        Route::get('/recently_sell', [sellController::class, 'show'])->name('recently_sell');
        Route::get('/{id}/edit', [sellController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [sellController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy', [sellController::class, 'destroy'])->name('destroy');
    }); 
});