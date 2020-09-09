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

Route::get('/', function () {

	$categories = \App\Categories::all();
	$products = \App\Products::all();

    return view('welcome', ['categories' => $categories, 'products' => $products]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product/show/{id?}', 'ProductController@show')->name('product.show');
Route::get('/category/show/{title?}', 'CategoryController@show')->name('category.show');
Route::get('/product/buy/{id?}', 'ProductController@buy')->name('product.buy');
Route::get('/order', 'OrderController@index')->name('order');
Route::get('/myorders', 'MyordersController@index')->name('myorders');
Route::get('/category/add', 'CategoryController@add')->name('category.add');
Route::get('/category/delete/{title?}', 'CategoryController@delete')->name('category.delete');
Route::get('/category/edit/{title?}', 'CategoryController@edit')->name('category.edit');
Route::post('/product/add', 'ProductController@add')->name('product.add');
Route::get('/product/delete/{id?}', 'ProductController@delete')->name('product.delete');
Route::get('/product/edit/{id?}', 'ProductController@edit')->name('product.edit');
Route::get('/editproduct', 'EditproductController@index')->name('editproduct');
Route::get('/allorders', 'AllordersController@index')->name('allorders');











