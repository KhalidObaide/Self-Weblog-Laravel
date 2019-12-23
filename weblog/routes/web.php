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


// Index Page 
Route::get('/', 'MainController@index_g');

Route::get('/admin', 'MainController@admin_g');

/*
Route::get('/', function () {
    return view('welcome');
});

 */
