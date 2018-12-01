<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
