<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'MainController@index')->name('main');
Route::get('/cat/{catName}', 'MainController@getProdactusOfCategory')->name('one_main_category');
Route::get('/cart', 'MainController@getCart')->name('get_cart');
Route::get('/cart_items/{ids}', 'MainController@getCartItems')->name('get_cart_items');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth:web'], function () {       

    Route::get('/checkout', 'MainController@checkout')->name('checkout');
});




