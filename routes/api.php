<?php

use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PurchaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::resource('order', OrderController::class);

Route::resource('purchase', PurchaseController::class);


