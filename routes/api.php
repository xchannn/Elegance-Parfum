<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Category Routes
Route::apiResource('categories', CategoryController::class);

// Product Routes
Route::apiResource('products', ProductController::class);
Route::get('products/featured', [ProductController::class, 'featured']);
Route::get('products/category/{categoryId}', [ProductController::class, 'byCategory']);

// Order Routes
Route::apiResource('orders', OrderController::class);
Route::get('orders/user/{userId}', [OrderController::class, 'userOrders']); 