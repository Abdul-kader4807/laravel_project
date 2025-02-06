<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('customer',[CustomerController::class,'index']);

Route::prefix('customer')->group(function(){
Route::get('create',[CustomerController::class,'create']);
Route::post('create', [CustomerController::class,'store']);
Route::get('update/{id}',[CustomerController::class,'edit']);
Route::post('update',[CustomerController::class,'update']);
Route::get('delete/{id}',[CustomerController::class,'destroy_view']);
Route::post('delete',[CustomerController::class,'destroy']);
Route::post('customer/search',[CustomerController::class,'search']);
Route::get('show/{id}',[CustomerController::class,'show']);

});


Route::get('supplier' ,[SupplierController::class,'index']);

Route::prefix('supplier')->group(function(){
    Route::get('create' , [SupplierController::class,'create']);


});
