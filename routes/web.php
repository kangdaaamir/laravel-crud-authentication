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

/*
 * @author Batuhan Batal <batuhanbatal@gmail.com>
 */

Route::get('/', function () {
    echo "<a href='/login'>Click to Go to Login Page</a>";
});


// Admin Routes
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin', 'middleware' => 'auth'], function(){
    // Index   
    Route::get('/',                      'HomeController@index')->name('.index');
    // User Index
    Route::get('/users',                 'UsersController@index')->name('.users.index');
    // User Create 
    Route::get('/users/create',          'UsersController@create')->name('.users.create');
    Route::post('/users/store',          'UsersController@store')->name('.users.store');
    // User Edit
    Route::get('/users/edit/{id}',       'UsersController@edit')->name('.users.edit');
    Route::put('/users/update/{id}',     'UsersController@update')->name('.users.update');
    // User Delete
    Route::delete('/users/delete/{id}',  'UsersController@delete')->name('.users.delete');


    // User Index
    Route::get('/categories',                 'CategoriesController@index')->name('.categories.index');
    // User Create 
    Route::get('/categories/create',          'CategoriesController@create')->name('.categories.create');
    Route::post('/categories/store',          'CategoriesController@store')->name('.categories.store');
    // User Edit
    Route::get('/categories/edit/{id}',       'CategoriesController@edit')->name('.categories.edit');
    Route::put('/categories/update/{id}',     'CategoriesController@update')->name('.categories.update');
    // User Delete
    Route::delete('/categories/delete/{id}',  'CategoriesController@delete')->name('.categories.delete');


    // User Index
    Route::get('/products',                 'ProductController@index')->name('.products.index');
    // User Create 
    Route::get('/products/create',          'ProductController@create')->name('.products.create');
    Route::post('/products/store',          'ProductController@store')->name('.products.store');
    // User Edit
    Route::get('/products/edit/{id}',       'ProductController@edit')->name('.products.edit');
    Route::put('/products/update/{id}',     'ProductController@update')->name('.products.update');
    // User Delete
    Route::delete('/products/delete/{id}',  'ProductController@delete')->name('.products.delete');
});


// Auth Routes
Route::group(['namespace' => 'Auth', 'as' => 'auth'], function(){
    // Login Page 
    Route::get('/login',     'LoginController@showLoginForm')->name('.login');
    // Login Post
    Route::post('/login',    'LoginController@login')->name('.login');
    // Logout
    Route::get('/logout',    'LoginController@logout')->name('.logout');
});