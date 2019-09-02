<?php


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', 'LoginController@login')->name('login');

Route::post('/login', 'LoginController@postLogin')->name('post.login');

Route::get('/logout', 'LoginController@logout')->name('logout');



/*********************
 * Admin Route Group *
 ********************/
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'prevent-back-history']], function () {
	// Admin Login
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

	// User Management
	Route::get('/users', 'UserController@index')->name('users');

	// All users
	Route::get('/all/users', 'UserController@all')->name('all.users');


	// Municipalities
	Route::get('/municipalities', 'MunicipalityController@index')->name('municipalities');


});



/***********************
* Employee Route Group *
************************/
Route::group(['prefix' => 'emp', 'middleware' => ['employee', 'prevent-back-history']], function () {
	Route::get('/dashboard', 'EmployeeController@dashboard')->name('emp.dashboard');
});