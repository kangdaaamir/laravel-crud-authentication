<?php

use Illuminate\Http\Request;

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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::middleware('auth:api')->group(function () {



Route::get('category_list', 'API\CategoriesController@get_list');

Route::post('product_list', 'API\ProductController@get_list');

Route::post('product_search', 'API\ProductController@search_product');

Route::post('get_product_details', 'API\ProductController@get_product_details');



});





