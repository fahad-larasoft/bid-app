<?php

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
    return view('welcome');
});

Auth::routes();


Route::group(['before' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('products', 'ProductsController')->middleware('role:seller');

    Route::post('products/{product}/bid', 'ProductsController@storeBid')->name('products.store.bid');
    Route::get('products/{product}/bids', 'ProductsController@bids')->name('products.bids');
});
