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

// Admin Page
Route::get('/admin', 'MainController@admin_g');

// Art Page
Route::get('/{id}', 'MainController@art_g')->where('id', '[0-9]+');

// Post An Art
Route::post('/post/', 'MainController@post_p');

// Comment For A Post
Route::post('/comment/{id}/', 'MainController@comment_p') -> where ('id', '[0-9]+');

// Delete Comment 
Route::get('/delete_comment/{id}/', 'MainController@delete_comment') -> where ('id', '[0-9]+');


/*
Route::get('/', function () {
    return view('welcome');
});

 */
