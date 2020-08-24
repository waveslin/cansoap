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

Route::get('/', ['uses' => 'ShopController@showIndex', 'as' => 'soap.index'])->middleware('forcessl');

Route::get('about', ['uses' => 'ShopController@showAbout', 'as' => 'soap.about'])->middleware('forcessl');

Route::get('contact', ['uses' => 'ShopController@showContact', 'as' => 'soap.contact'])->middleware('forcessl');

Route::get('order', ['uses' => 'ShopController@showOrder', 'as' => 'soap.order'])->middleware('forcessl');

Route::get('privacy', ['uses' => 'ShopController@showPrivacy', 'as' => 'soap.privacy'])->middleware('forcessl');

Route::get('wholesale', ['uses' => 'ShopController@showWholesale', 'as' => 'soap.wholesale'])->middleware('forcessl');

Route::get('collection', ['uses' => 'ShopController@showCollection', 'as' => 'soap.collection'])->middleware('forcessl');

Route::get('product/{product_name}', ['uses' => 'ShopController@showProduct', 'as' => 'soap.product'])->middleware('forcessl');

Route::post('product/{product_name}', ['uses' => 'ShopController@addProduct', 'as' => 'soap.add'])->middleware('forcessl');

Route::get('cart', ['uses' => 'ShopController@showCart', 'as' => 'soap.cart'])->middleware('forcessl');
 
Route::post('cart', ['uses' => 'ShopController@updateCart', 'as' => 'soap.update'])->middleware('forcessl');

Route::get('remove/{product_name}', ['uses' => 'ShopController@removeCart', 'as' => 'soap.remove'])->middleware('forcessl');

Route::get('payment', ['uses' => 'ShopController@getPayment', 'as' => 'soap.checkout'])->middleware('check.cart', 'forcessl');

Route::post('payment', ['uses' => 'ShopController@makePayment', 'as' => 'soap.payment'])->middleware('check.cart', 'forcessl');;

Route::get('receipt/{oid}', ['uses' => 'pdfController@makeReceipt', 'as' => 'soap.receipt'])->middleware('forcessl');