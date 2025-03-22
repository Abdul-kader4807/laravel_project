<?php

use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PurchaseController;
use App\Http\Controllers\api\SupplierController;

use Illuminate\Console\View\Components\Warn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::resource('order', OrderController::class);
Route::get('order', [CustomerController::class,'order']);
Route::get('invoicebyId/{id}', [CustomerController::class,'invoicebyId']);

Route::resource('purchase', PurchaseController::class);
Route::get('purchase', [CustomerController::class,'purchase']);

Route::get('suppliers',[SupplierController::class, 'index']);
Route::get('warehouses',[SupplierController::class, 'warehouse']);
Route::get('products',[SupplierController::class, 'products']);
Route::post('saveReactpurchase',[SupplierController::class, 'saveReactpurchase']);


Route::get('customers',[CustomerController::class, 'index']);
Route::get('warehouses',[CustomerController::class, 'warehouse']);
Route::get('products',[CustomerController::class, 'products']);
Route::get('stocks',[CustomerController::class, 'react']);

Route::post('saveReactorder',[CustomerController::class, 'saveReactorder']);
