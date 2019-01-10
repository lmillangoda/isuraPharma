<?php

use App\Product;
use App\Branch;

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

Route::get('/', function () {
    $products = DB::table('products')->paginate(10);
    return view('welcome', compact('products'));
});

Auth::routes(['verify' => true]);
Route::get('register', "Auth\RegisterController@reg");
Route::post('register', "Auth\RegisterController@register")->name('register');

Route::get('/home', 'HomeController@index')->name('home');

//Customer routes
Route::get("custedit", 'userprofcontroller@index')->name('custedit');
Route::post("store", 'userprofcontroller@store')->name('custstore');
Route::get("profile", 'userprofcontroller@profile')->name('profile');

//AdminController routes
Route::get("/admin", 'AdminController@index')->name('admin');
Route::post('admin/empRegister', 'AdminController@employeeReg')->name('empregister');
Route::post('/admin/profile/changepassword', 'EmployeeController@cPassword')->name('cPassword');

//employee controller
Route::get('/admin/profile', 'EmployeeController@profile')->name('aProfile');
Route::post('/admin/employee/edit', "EmployeeController@empupdate")->name('empupdate');

//products routes
Route::resource('products', 'ProductsController');
Route::post('/products/search/', 'ProductsController@search')->name('products.search');

//Supplier routes
Route::resource('suppliers', 'SuppliersController');

//Branch routes
Route::resource('branches', 'BranchesController');

//Employee routes
Route::resource('employees', 'EmployeeController');

//Reports routes
Route::resource('reports', 'ReportsController');
Route::post('/reports/display', 'ReportsController@displayReport')->name('reports.display');

//dash components
Route::get('employeeReg', function () {
    $branch = Branch::all();
    return view('dash_comp.employee_reg', compact('branch'));
});

    //Stock Routes
    Route::resource('stock', 'StockController');
    Route::get('/stock/edit/branch/{branch}/product/{product}/batch/{batch}', 'StockController@edit')->name('stock.edit');
    Route::put('/stock/add/branch/{branch}/product/{product}/batch/{batch}', 'StockController@update')->name('stock.update');
    Route::put('/stock/substract/branch/{branch}/product/{product}/batch/{batch}', 'StockController@substract')->name('stock.substract'); //substracts from the currnt Stock
    Route::put('stock/empty/branch/{branch}/product/{product}/batch/{batch}', 'StockController@empty')->name('stock.empty');

    //Bills Route
    Route::resource('bills', 'BillsController');
    Route::post('/bills/display/', 'BillsController@displayBill')->name('bill.display');
    Route::post('/bills/removeItem/', 'BillsController@removeItem')->name('bill.removeItem');
    Route::post('/bills/search/', 'BillsController@search')->name('bills.search');
    Route::get('/pdf/{bill}/{total}', 'BillsController@printBill')->name('pdf');

    //warnings
    Route::resource('warnings', 'WarningsController');
    
    //Message
    Route::resource('messages', 'MessagesController');
