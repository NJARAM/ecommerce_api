<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/health', [AuthController::class,'health']);

Route::middleware('auth:sanctum')->group(function () {
Route::apiResource('products',ProductController::class);
Route::apiResource('cart', CartController::class);
Route::apiResource('orders', OrderController::class);
Route::post('/logout', [AuthController::class,'logout']);
});
