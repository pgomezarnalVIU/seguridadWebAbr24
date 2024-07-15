<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//Rutas de producto para SQLInjection
Route::get('/products', [ProductController::class, 'index']);
Route::get('/productDetail', [ProductController::class, 'showProductDetail']);
Route::get('/productDetailSeg', [ProductController::class, 'showProductDetailSeg']);
Route::get('/productDetailSegORM', [ProductController::class, 'showProductDetailSegORM']);
Route::get('/productDetailSegByName', [ProductController::class, 'showProductDetailSegByName']);
Route::get('/productDetailCol', [ProductController::class, 'showProductDetailCol']);
