<?php


Route::group(['middleware' => 'prevent-back-history'], function() {
	// Route to landing Page
	Route::get('/', 'GeneralController@landingPage')->name('landing.page');

	// Routel to view Login form
	Route::get('/login', 'LoginController@login')->name('login');

	// Route to login Users
	Route::post('/login', 'LoginController@postLogin')->name('post.login');


	// Route to logout Users
	Route::get('/logout', 'LoginController@logout')->name('logout');

});


/*********************
 * Admin Route Group *
 ********************/
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'prevent-back-history']], function () {
	// Admin Login
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

	// User Management
	Route::get('/users', 'UserController@index')->name('users');

	// View User
	Route::get('/user/info/{id}', 'UserController@viewUser')->name('view.user');

	// Add User
	Route::get('/user/add', 'UserController@addUser')->name('add.user');

	// Update User
	Route::get('/user/update/info/{id}', 'UserController@updateUser')->name('update.user');

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