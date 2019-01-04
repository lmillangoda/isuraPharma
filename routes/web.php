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
    $products = Product::all();
    return view('welcome',compact('products'));
});

Auth::routes(['verify' => true]);

Route::get('register',"Auth\RegisterController@reg");
Route::post('register',"Auth\RegisterController@register")->name('register');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('messages', 'pagescontroller@messages')->name('messages');

// Route::get('/verify/{token}','verifycontroller@verify')->name('verify');

Route::get("propic",'userprofcontroller@index')->name('propic');

Route::post("store",'userprofcontroller@store');

Route::get("profile",'userprofcontroller@profile')->name('profile');

Route::get("/admin",'AdminController@index')->name('admin');

Route::post('admin/empRegister','AdminController@employeeReg')->name('empregister');

Route::resource('products', 'ProductsController');

Route::resource('suppliers', 'SuppliersController');

Route::resource('branches', 'BranchesController');

Route::resource('employees', 'EmployeeController');

//dash components
Route::get('employeeReg',function(){
    $branch = Branch::all();
    return view('dash_comp.employee_reg',compact('branch'));
});

//Stock Routes
Route::resource('stock', 'StockController');
Route::get('/stock/create/branch/{branch}/product/{product}', 'StockController@create')->name('stock.create');
Route::get('/stock/edit/branch/{branch}/product/{product}', 'StockController@edit')->name('stock.edit');
Route::put('/stock/add/branch/{branch}/product/{product}', 'StockController@update')->name('stock.update');
Route::put('/stock/substract/branch/{branch}/product/{product}', 'StockController@substract')->name('stock.substract'); //substracts from the currnt Stock

//facebook socialite routes
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//Bills Route
Route::resource('bills', 'BillsController');
Route::post('/bills/display/', 'BillsController@displayBill')->name('bill.display');
Route::post('/bills/removeItem/', 'BillsController@removeItem')->name('bill.removeItem');
