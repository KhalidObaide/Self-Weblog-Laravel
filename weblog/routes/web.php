<?php
use Illuminate\Support\Facades\DB;
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


Route::get('/', 'MainController@index_g');
Route::get('/admin', 'MainController@admin_g');
Route::get('/{id}', 'MainController@art_g')->where('id', '[0-9]+');
Route::post('/post/', 'MainController@post_p');
Route::post('/comment/{id}/', 'MainController@comment_p') -> where ('id', '[0-9]+');
Route::get('/delete_comment/{id}/', 'MainController@delete_comment') -> where ('id', '[0-9]+');
Route::post('/contact/', 'MainController@contact_p');
Route::get('/delete_contact/{id}/', 'MainController@delete_contact') -> where ('id' , '[0-9]+');
Route::get('/answer/{id}/', 'MainController@answer_g') -> where ('id', '[0-9]+');
Route::post('/answer/{id}/', 'MainController@answer_p') -> where ('id', '[0-9]+');
Route::get('/delete_post/{id}/', 'MainController@delete_post') -> where ('id', '[0-9]+');
Route::get('/edit_post/{id}/', 'MainController@edit_post_g') -> where ('id', '[0-9]+');
Route::post('/edit_post/', 'MainController@edit_post_p');
Route::post('/edit_profile/', 'MainController@edit_profile');
Route::post('/login/', 'MainController@login');
Route::get('/logout/', 'MainController@logout');
Route::get('/login/', 'MainController@login_g');
Route::get('/signup/', 'MainController@signup_g');
Route::post('/signup/', 'MainController@signup_p');


// TEST route
Route::get('/test/', function (){
	DB::table('admin')->insert([
		'name' => 'Khalid Obaide',
		'username' => 'KhalidObaide',
		'intro'=> 'HEllo I Am Khalid Obaide',
		'time_added' => '25 Dec 2019',
		'password' => '123456789'
	]);

	return 'HEllo World';
});


/*
Route::get('/', function () {
    return view('welcome');
});
 */

