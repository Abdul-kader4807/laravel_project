<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('customer',[CustomerController::class,'index']);

// Route::prefix('customer')->group(function(){
// Route::get('create',[CustomerController::class,'create']);
// Route::post('create', [CustomerController::class,'store']);
// Route::get('update/{id}',[CustomerController::class,'edit']);
// Route::post('update',[CustomerController::class,'update']);
// Route::get('delete/{id}',[CustomerController::class,'destroy_view']);
// Route::post('delete',[CustomerController::class,'destroy']);
// Route::post('customer/search',[CustomerController::class,'search']);
// Route::get('show/{id}',[CustomerController::class,'show']);

// });

Route::get('customer/delete/{id}',[CustomerController::class,'destroy_view']);
Route::post('customer/search',[CustomerController::class,'search']);
Route::resource('customer',CustomerController::class);


Route::get('supplier/delete/{id}' ,[SupplierController::class, 'destroy_view']);
 Route::post('supplier/search' ,[SupplierController::class, 'search']);
Route::resource('supplier', SupplierController::class);

Route::get('category/delete/{id}', [CategoryController::class,'destroy_view']);
Route::post('category/search',[CategoryController::class,'search']);
Route::resource('category', CategoryController::class);


Route::resource('product', ProductController::class);



Route::get('status/delete/{id}',[StatusController::class,'destroy_view']);
Route::post('status/search',[StatusController::class,'search']);
Route::resource('status',StatusController::class);


Route::get('manufacturer/delete/{id}',[ManufacturerController::class,'destroy_view']);
Route::post('manufacturer/search',[ManufacturerController::class,'search']);
Route::resource('manufacturer', ManufacturerController::class);
