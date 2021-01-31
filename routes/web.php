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
//Route::get('/checkout',[CheckoutController::class, 'index']); //laravel 8

Route::get('/', 'App\Http\Controllers\LoginController@index');
Route::post('/login', 'App\Http\Controllers\loginController@login');
Route::get('/logout', 'App\Http\Controllers\loginController@logout');

Route::get('/product', 'App\Http\Controllers\productController@index');
Route::post('/product', 'App\Http\Controllers\productController@search');

Route::get('/cart', 'App\Http\Controllers\cartController@index');
Route::post('/cart', 'App\Http\Controllers\cartController@store');
Route::delete('/cart/{cart}', 'App\Http\Controllers\cartController@destroy');
Route::post('/minusQty', 'App\Http\Controllers\cartController@minusQty');
Route::post('/addQty', 'App\Http\Controllers\cartController@addQty');

Route::get('/history', 'App\Http\Controllers\historyController@index');
Route::post('/detail', 'App\Http\Controllers\historyController@show');

Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index');
Route::post('/checkout/payment', 'App\Http\Controllers\CheckoutController@payment');

Route::get('/edit-profile/{id}', 'App\Http\Controllers\CustomerController@edit');
Route::post('/edit-profile/update/{id}', 'App\Http\Controllers\CustomerController@update');

Route::get('/shipping', 'App\Http\Controllers\ShippingController@index');
Route::get('/shipping/changeStatus/{id}/{product_id}/{orders_id}', 'App\Http\Controllers\ShippingController@changeStatus');
Route::post('/shipping/saveFeedback', 'App\Http\Controllers\ShippingController@saveFeedback');

Route::get('/wishlist', 'App\Http\Controllers\WishlistController@index');
Route::post('/wishlist/addWishlist/{id}', 'App\Http\Controllers\WishlistController@addWishlist');
// Route::get('/orderproduct', 'App\Http\Controllers\OrderController@index');


Route::get('/store/{store}/analytics', 'App\Http\Controllers\StoreController@stats');
Route::get('/store/{store}/profile', 'App\Http\Controllers\StoreController@showProfile');
Route::get('/store/{store}/orders', 'App\Http\Controllers\OrderController@index');
Route::get('/store/{store}/order/{id}', 'App\Http\Controllers\OrderController@show');
Route::put('/store/{store}/order/{id}/update', 'App\Http\Controllers\OrderController@update')->name('order-status.update');
Route::get('/store/{store}/products', '\App\Http\Controllers\ProductController@indexStore');
Route::get('/store/{store}/products/{mode}/{id}', '\App\Http\Controllers\ProductController@editListingItem');
Route::put('/store/{store}/products/update-price', '\App\Http\Controllers\ProductController@updateListingPrices')->name('store-products.update-price');
Route::get('/store/{store}/products/create', '\App\Http\Controllers\ProductController@create');
Route::post('/store/{store}/products', '\App\Http\Controllers\ProductController@store')->name('store-products.store');
Route::delete('/store{store}/products', '\App\Http\Controllers\ProductController@destroy')->name('store-products.delete');
Route::post('/store/{store}/products/create', 'App\Http\Controllers\ProductController@showSpecific')->name('store-products.edit');
Route::put('/store/{store}/products/{product}/update', 'App\Http\Controllers\ProductController@update')->name('store-products.update');

