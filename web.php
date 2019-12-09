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

Route::get('/', function(){

	echo "welcome";
});

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LogoutController@index');

Route::group(['middleware'=>['sess']], function(){

	Route::get('/home', ['as'=>'home.index','uses'=>'HomeController@index']);
	Route::get('/admin/authorList', ['as'=>'author.index','uses'=>'AdminController@index']);	
	Route::get('/admin/details/{id}', 'AdminController@details')->name('author.details');

	// Route::group(['middleware'=>['type']], function(){
	// 		Route::get('/student/edit/{id}', 'StudentController@edit')->name('student.edit');
	// 		Route::post('/student/edit/{id}', 'StudentController@update')->name('student.update');
	// 		Route::get('/student/delete/{id}', 'StudentController@delete')->name('student.delete');
	// 		Route::post('/student/delete/{id}', 'StudentController@destroy')->name('student.destroy');
	// 		Route::get('/student/add', 'StudentController@add')->name('student.add');
	// 		Route::post('/student/add', 'StudentController@insert');
	// });	
	Route::get('/admin/edit/{id}', 'AdminController@edit')->name('author.edit');
	Route::post('/admin/edit/{id}', 'AdminController@update')->name('author.update');
	Route::get('/admin/delete/{id}', 'AdminController@delete')->name('author.delete');
	Route::post('/admin/delete/{id}', 'AdminController@destroy')->name('author.destroy');
	Route::get('/admin/add', 'AdminController@add')->name('author.add');
	Route::post('/admin/add', 'AdminController@insert');

});



