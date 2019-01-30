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

Auth::routes();

Route::get('/', 'ItemController@index')->name('home');

Route::get('/categories/{category}', 'ItemController@show');

Route::get('/orders', 'OrderController@index')->name('orders');

Route::post('/orders/{order}/items', 'OrderItemController@store');

Route::get('/orders/{order}', 'OrderController@show');

Route::post('/orders/{order}/submit', 'OrderController@submit');

Route::delete('/orders/{order}/items/{item}', 'OrderItemController@destroy');

Route::post('/orders/{order}/items/{item}/decrease', 'OrderItemController@decrease');
Route::post('/orders/{order}/items/{item}/increase', 'OrderItemController@increase');

