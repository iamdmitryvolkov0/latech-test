<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::post('/reserve_product', [ProductController::class, 'reserveProduct']);
Route::post('/cancel_reservation', [ProductController::class, 'cancelReservation']);
Route::get('/stock_remainders', [StockController::class, 'getRemaindersByStockId']);
