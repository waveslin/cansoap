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

Route::get('/', ['uses' => 'ShopController@showIndex', 'as' => 'soap.index']);

Route::get('about', ['uses' => 'ShopController@showAbout', 'as' => 'soap.about']);

Route::get('contact', ['uses' => 'ShopController@showContact', 'as' => 'soap.contact']);

Route::get('order', ['uses' => 'ShopController@showOrder', 'as' => 'soap.order']);

Route::get('privacy', ['uses' => 'ShopController@showPrivacy', 'as' => 'soap.privacy']);

Route::get('wholesale', ['uses' => 'ShopController@showWholesale', 'as' => 'soap.wholesale']);

Route::get('collection', ['uses' => 'ShopController@showCollection', 'as' => 'soap.collection']);

Route::get('product/{product_name}', ['uses' => 'ShopController@showProduct']);

Route::post('product/{product_name}', ['uses' => 'ShopController@addProduct']);

Route::get('cart', ['uses' => 'ShopController@showCart', 'as' => 'soap.cart']);
 
Route::post('cart', ['uses' => 'ShopController@updateCart']);

Route::get('remove/{product_name}', ['uses' => 'ShopController@removeCart']);

Route::get('payment', ['uses' => 'ShopController@getPayment', 'middleware' => 'check.cart']);

Route::post('payment', ['uses' => 'ShopController@makePayment', 'middleware' => 'check.cart']);

Route::get('receipt/{oid}', ['uses' => 'pdfController@makeReceipt', 'as' => 'soap.receipt']);