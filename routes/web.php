<?php

use App\Http\Controllers\brandController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Milon\Barcode\PDF417;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/customer', 'CustomerController');

Route::resource('/promotion', 'PromotionController');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/backlogin','UserController@login');
Route::post('/validates','UserController@loginValidate')->name('validate');
Route::get('/userReport','UserController@createReport')->name('user.report');


Route::resource('/bank','BankAccountController');
Route::resource('/exchange','ExchangeController');


Route::get('/', function () {
    return view('dashboard');
});


Route::resource('employee', 'EmployeeController');

Route::resource('voucher', 'VoucherController');

Route::resource('attendance', 'AttendanceController');
Route::patch('/updateAttendance','AttendanceController@updateAttendance')->name('attendance.updateAttendance');
Route::patch('/empout','AttendanceController@markOut')->name('attendance.markout');
//Route::get('/employees', 'EmployeeController@index');
//Route::get('/create', 'EmployeeController@create');
//Route::post('/store', 'EmployeeController@store')->name('employees.store');
//Route::post('/employees/{emp_id}', 'EmployeeController@show');


Route::get('/sample', function () {
    return view('sampleAddForm');
});
Route::get('/allForm', function () {
    return view('sampleAllForm');
});



Route::resource('vendors','VendorController');
Route::resource('service', 'ServiceController');

Route::get('/test', 'VendorController@index');
Route::post('/store', 'VendorController@store');
Auth::routes();
// Route::get('/purchase','PurchaseController@index')->name('order');
// Route::get('/createOrder','PurchaseController@create')->name('createOrder');
// Route::get('/addProduct','AddProductController@index')->name('addProduct');
// Route::get('/editOrder','EditPurchaseOrderController@index')->name('editOrder');

Route::resource('purchase', 'PurchaseController');


// Route::get('/loyalty','AllLoyaltyController@index')->name('allLoyalty');
// Route::get('/addLoyalty','AddLoyaltyController@index')->name('addLoyalty');
// Route::post('/addLoyalty','AddLoyaltyController@store');
// Route::get('/editLoyalty','EditLoyaltyController@index')->name('editLoyalty');

Route::resource('/pos', 'POSController');
Route::get('/login', function(){
    return view('login');
});

Route::get('/role', function(){
    return view('User.addUserRole');
});
Route::get('print/test', 'PrintController@test');



Route::get('/barcode', 'BarcodeController@index')->name('barcode');
Route::get('/barcodeprint', 'BarcodeController@createPDF')->name('printBarcode');

Route::resource('loyalty', 'LoyaltyController');

// Route::get('/vendorPayment','VendorPaymentController@index')->name('vendorPayment');
// Route::get('/salaryPayment','SalaryPaymentController@index')->name('salaryPayment');

Route::resource('vendorPayment', 'VendorPaymentController');
Route::resource('salaryPayment', 'SalaryPaymentController');
Route::get('voucherid', 'VoucherController@getLastIndex')->name('voucher.id');
Route::get('serviceid', 'ServiceController@getLastIndex');
Route::get('voucheramount/{id}', 'VoucherController@getVoucherAmount');
Route::get('customermobile/{mobile}', 'POSController@getCustomer');

Route::get('posproduct', 'POSController@returnProducts');
Auth::routes();

Route::get('/admin/login','Auth\LoginAdminController@index')->name('login.admin');
Route::post('/admin/login','Auth\LoginAdminController@login')->name('login.admin');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::resource('role', 'UserRoleController');
Route::resource('category', 'CategoryController');
Route::resource('product', 'productController');
Route::resource('expense', 'ExpenseController');
Route::resource('sale', 'SalesController');
Route::patch('/updateExpense', 'ExpenseController@updateExpense')->name('updateExpense');
Route::patch('/password/{id}','UserController@updatePassword')->name('user.password');
Route::patch('/pin/{id}','UserController@updatePin')->name('user.pin');
Route::resource('brand', 'brandController');
Route::resource('inventories', 'InventoryController');
Route::resource('stock-transfers', 'StockTransferController');
Route::get('stock-transfers/{stock_transfer}/complete', 'StockTransferController@complete')->name('stock-transfers.complete');
Route::resource('inventory-counts', 'InventoryCountController');
Route::get('inventory-counts/{inventory_count}/replace', 'InventoryCountController@replace')->name('inventory-counts.replace');
Route::get('inventory-counts/{inventory_count}/complete', 'InventoryCountController@complete')->name('inventory-counts.complete');
Route::get('/inventory-report','InventoryController@createReport')->name('inventories.report');

Route::get('/reports', 'ReportController@index')->name('reports.index');
//Route::get('/reports/product-wise-sales', 'ReportController@productWiseSales')->name('reports.product-wise-sales');
Route::get('/reports/stock-transfer-summary', 'ReportController@stockTransferSummary')->name('reports.stock-transfer-summary');
Route::post('/reports/export-stock-transfer-summary', 'ReportController@exportStockTransferSummary')->name('reports.export-stock-transfer-summary');
Route::get('/reports/stock-valuation', 'ReportController@stockValuation')->name('reports.stock-valuation');
Route::get('/reports/export-stock-valuation', 'ReportController@exportStockValuation')->name('reports.export-stock-valuation');
Route::get('/reports/product-wise-stock', 'ReportController@productWiseStock')->name('reports.product-wise-stock');
Route::get('/reports/export-product-wise-stock', 'ReportController@exportProductWiseStock')->name('reports.export-product-wise-stock');
Route::get('/reports/category-wise-stock', 'ReportController@categoryWiseStock')->name('reports.category-wise-stock');
Route::get('/reports/export-category-wise-stock', 'ReportController@exportCategoryWiseStock')->name('reports.export-category-wise-stock');
Route::get('/reports/supplier-wise-stock', 'ReportController@supplierWiseStock')->name('reports.supplier-wise-stock');
Route::get('/reports/export-supplier-wise-stock', 'ReportController@exportSupplierWiseStock')->name('reports.export-supplier-wise-stock');
Route::get('/reports/zero-stock-product', 'ReportController@zeroStockProduct')->name('reports.zero-stock-product');
Route::get('/reports/export-zero-stock-product', 'ReportController@exportZeroStockProduct')->name('reports.export-zero-stock-product');
Route::get('/reports/minus-stock-product', 'ReportController@minusStockProduct')->name('reports.minus-stock-product');
Route::get('/reports/export-minus-stock-product', 'ReportController@exportMinusStockProduct')->name('reports.export-minus-stock-product');

