<?php
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\WarehouseController;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


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


Route::get('brand/delete/{id}', [BrandController::class,'destroy_view']);
Route::post('brand/search',[BrandController::class,'search']);
Route::resource('brand',BrandController::class);


Route::get('warehouse/delete/{id}',[WarehouseController::class,'destroy_view']);
Route::post('warehouse/search', [WarehouseController::class,'search']);
Route::resource('warehouse',WarehouseController::class);



Route::get('uom/delete/{id}',[UomController::class,'destroy_view']);
Route::post('uom/search', [UomController::class,'search']);
Route::resource('uom',UomController::class);


require __DIR__.'/auth.php';
