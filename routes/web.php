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
    return view('welcome');
});
//Route::get('/checkout',[CheckoutController::class, 'index']); //laravel 8
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index');
Route::post('/checkout/payment', 'App\Http\Controllers\CheckoutController@payment');

Route::get('/edit-profile/{id}', 'App\Http\Controllers\CustomerController@edit');
Route::post('/edit-profile/update/{id}', 'App\Http\Controllers\CustomerController@update');

Route::get('/shipping', 'App\Http\Controllers\ShippingController@index');
Route::get('/wishlist', 'App\Http\Controllers\WishlistController@index');