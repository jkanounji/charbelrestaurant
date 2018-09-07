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

Route::get('/', 'PagesController@index');
Route::resource('products', 'ProductsController');
Route::resource('productscarts', 'ProductsCartsController');
Route::resource('carts', 'CartsController');
Route::resource('events', 'EventsController');
Route::resource('users', 'UsersController');
Route::resource('reservations', 'ReservationsController');
Route::resource('orders', 'OrdersController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
