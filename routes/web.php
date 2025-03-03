<?php
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderReportController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\PurchaseReportController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockReportController;
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

Route::get('product/delete/{id}',[ProductController::class,'destroy_view']);
Route::post('product/search',[ProductController::class,'search']);
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


Route::get('purchase/delete/{id}',[PurchaseController::class,'destroy_view']);
Route::post('purchase/search',[PurchaseController::class,'search']);
Route::resource('purchase',PurchaseController::class);
Route::post('find_supplier',[PurchaseController::class,'find_supplier']);
Route::post('find_uom',[PurchaseController::class,'find_uom']);



Route::get('purchase_deatil/delete/{id}',[PurchaseDetailController::class,'destroy_view']);
Route::post('purchase_deatil/search',[PurchaseDetailController::class,'search']);
Route::resource('purchase_deatil',PurchaseDetailController::class);

Route::get('/purchase-report',[PurchaseReportController::class,'index']);
Route::post('/purchase-report',[PurchaseReportController::class,'show']);


Route::get('order', [OrderController::class, 'index'])->name('order.index');
Route::get('order/delete/{id}',[OrderController::class,'destroy_view']);
Route::post('order/search',[OrderController::class,'search']);
Route::resource('order',OrderController::class);
Route::post('find_customer', [OrderController::class, 'find_customer']);
 Route::post('find_product', [OrderController::class, 'find_product']);
 Route::post('find_uom', [OrderController::class, 'find_uom']);

Route::get('/order-report',[OrderReportController::class, 'index']);
Route::post('/order-report',[OrderReportController::class,'show']);





Route::get('payment_status/delete/{id}',[PaymentStatusController::class,'destroy_view']);
Route::post('payment_status/search',[PaymentStatusController::class,'search']);
Route::resource('payment_status',PaymentStatusController::class);




Route::get('stock/delete/{id}',[StockController::class,'destroy_view']);
Route::post('/stock/search', [StockController::class, 'search']);
// Route::put('/stock/{id}', [StockController::class, 'update']);
Route::resource('stock',StockController::class);

Route::get('/stock-report',[StockReportController::class,'index']);
Route::post('/stock-report',[StockReportController::class,'show']);


Route::get('order_detail/delete/{id}',[OrderDetailController::class,'destroy_view']);
Route::post('order_detail/search',[OrderDetailController::class,'search']);
Route::resource('order_detail',OrderDetailController::class);



require __DIR__.'/auth.php';
