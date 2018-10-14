<?php
use App\Product;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('messages', 'pagescontroller@messages')->name('messages');

Route::get('/verify/{token}','verifycontroller@verify')->name('verify');

Route::get("propic",'userprofcontroller@index')->name('propic');

Route::post("store",'userprofcontroller@store');

Route::get("profile",'userprofcontroller@profile')->name('profile');

Route::get("/admin",'adminUIController@index')->name('admin');

Route::resource('products', 'ProductsController');

Route::resource('suppliers', 'SuppliersController');

Route::resource('branches', 'BranchesController');






