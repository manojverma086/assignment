<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
//use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('shops', 'ShopController@index');
Route::get('shops/{id}', 'ShopController@show');
Route::post('shops', 'ShopController@store');
Route::put('shops/{id}', 'ShopController@update');
Route::delete('shops/{id}', 'ShopController@delete');
Route::get('shops/{shopId}/products', 'ProductController@index');
Route::get('shops/{shopId}/products/{id}', 'ProductController@show');
Route::post('shops/{shopId}/products', 'ProductController@store');
Route::put('shops/{shopId}/products/{id}', 'ProductController@update');
Route::patch('shops/{shopId}/products/{id}', 'ProductController@patch');
Route::delete('shops/{shopId}/products/{id}', 'ProductController@delete');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
