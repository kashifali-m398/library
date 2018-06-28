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

Route::get('/', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Auth::routes();

Route::group(['as'=>'user.', 'middleware'=>['user'] ], function(){
	Route::get('/racks', ['as'=>'racks', 'uses'=>'RackController@index']);
	Route::get('/racks/{id}/books', ['as'=>'rack_books', 'uses'=>'RackController@getRackBooks']);
	Route::get('/books/search', ['as'=>'search_books', 'uses'=>'RackController@searchBooks']);
});

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>['admin'] ], function(){
	Route::get('/dashboard', ['as'=>'dashboard', 'uses'=>'Admin\DashboardController@index']);
	
	Route::get('/racks', ['as'=>'racks.index', 'uses'=>'Admin\RackController@index']);
	Route::get('/racks/add', ['as'=>'racks.create', 'uses'=>'Admin\RackController@create']);
	Route::post('/racks/store', ['as'=>'racks.store', 'uses'=>'Admin\RackController@store']);
	Route::get('/racks/edit/{id}', ['as'=>'racks.edit', 'uses'=>'Admin\RackController@edit']);
	Route::post('/racks/update/{id}', ['as'=>'racks.update', 'uses'=>'Admin\RackController@update']);
	Route::get('/racks/delete/{id}', ['as'=>'racks.delete', 'uses'=>'Admin\RackController@delete']);

	Route::get('/books', ['as'=>'books.index', 'uses'=>'Admin\BookController@index']);
	Route::get('/books/add', ['as'=>'books.create', 'uses'=>'Admin\BookController@create']);
	Route::post('/books/store', ['as'=>'books.store', 'uses'=>'Admin\BookController@store']);
	Route::get('/books/edit', ['as'=>'books.edit', 'uses'=>'Admin\BookController@edit']);
	Route::post('/books/update', ['as'=>'books.update', 'uses'=>'Admin\BookController@update']);
	Route::get('/books/delete/{$id}', ['as'=>'books.delete', 'uses'=>'Admin\BookController@delete']);
});
