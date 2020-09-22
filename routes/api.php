<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::fallback(function () {
    return response()->json(['error' => true, 'message' => 'Route not found!'], 404);
});
Route::post('/login', 'API\LoginController@login');
Route::group(['middleware' => ['admin'], 'namespace' => 'API',], function () {
    Route::get('/catalogs', 'ApiController@catalogs');
    Route::get('/sub_catalogs/{catalog_id}', 'ApiController@sub_catalogs');
    Route::get('/products/{catalog_id}', 'ApiController@products');
    Route::get('/product/{product_id}', 'ApiController@show_product');
});
