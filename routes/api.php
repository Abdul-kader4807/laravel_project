<?php

use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\PurchaseController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\api\vue\BrandsController;
use App\Http\Controllers\api\vue\CategoryController;
use App\Http\Controllers\api\vue\CustomersController;
use App\Http\Controllers\api\vue\ManufacturerController;
use App\Http\Controllers\api\vue\OrdersController;
use App\Http\Controllers\api\vue\ProductController;
use App\Http\Controllers\api\vue\PurchasesController;
use App\Http\Controllers\api\vue\StatusController;
use App\Http\Controllers\api\vue\SuppliersController;
use App\Http\Controllers\api\vue\UomController;
use App\Http\Controllers\api\vue\userController;
use App\Http\Controllers\api\vue\WarehouseController;
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
Route::get('invoicebyshow/{id}', [CustomerController::class,'invoicebyshow']);

Route::get('suppliers',[SupplierController::class, 'index']);
Route::get('warehouses',[SupplierController::class, 'warehouse']);
Route::get('products',[SupplierController::class, 'products']);
Route::post('saveReactpurchase',[SupplierController::class, 'saveReactpurchase']);


Route::get('customers',[CustomerController::class, 'index']);
Route::get('warehouses',[CustomerController::class, 'warehouse']);
Route::get('products',[CustomerController::class, 'products']);
Route::get('stocks',[CustomerController::class, 'react']);

Route::post('saveReactorder',[CustomerController::class, 'saveReactorder']);

//VUE
Route::apiResource('customers',CustomersController::class);

Route::apiResource('users', UserController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('manufacturer', ManufacturerController::class);
Route::apiResource('orders', OrdersController::class);
Route::apiResource('purchases',PurchasesController::class);
Route::apiResource('suppliers',SuppliersController::class);
Route::apiResource('warehouse',WarehouseController::class);
Route::apiResource('brands',BrandsController::class);
Route::apiResource('uoms',UomController::class);
Route::apiResource('status',StatusController::class);

