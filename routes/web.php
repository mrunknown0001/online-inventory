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

	// Post Add User
	Route::post('/user/add', 'UserController@store')->name('store.user');

	// Update User
	Route::get('/user/update/info/{id}', 'UserController@updateUser')->name('update.user');

	// All users
	Route::get('/all/users', 'UserController@all')->name('all.users');


	// Transaction


	// Audit Trail
	Route::get('/audit-trail', 'AdminController@auditTrail')->name('audit.trail');

	// All audit trail logs
	Route::get('/all/audit-trail', 'AdminController@logs')->name('all.logs');


	// Suppliers
	Route::get('/suppliers', 'SupplierController@index')->name('suppliers');

	// Item Categories
	Route::get('/item-categories', 'ItemCategoryController@index')->name('item.categories');

	// Farms
	Route::get('/farms', 'FarmController@index')->name('farms');

	// Barangays
	Route::get('/barangays', 'BarangayController@index')->name('barangays');

	// Municipalities
	Route::get('/municipalities', 'MunicipalityController@index')->name('municipalities');

	// All Municipalities
	Route::get('/all/municipalities', 'MunicipalityController@all')->name('all.municipalities');

	// View municipality
	Route::get('/municipality/info/{id}', 'MunicipalityController@municipalityInfo')->name('view.municipality.info');

	// Species
	Route::get('/species', 'SpecyController@index')->name('species');

	// Animals
	Route::get('/animals', 'AnimalController@index')->name('animals');

	// Breeds
	Route::get('/breeds', 'BreedController@index')->name('breeds');

});



/***********************
* Employee Route Group *
************************/
Route::group(['prefix' => 'emp', 'middleware' => ['employee', 'prevent-back-history']], function () {
	Route::get('/dashboard', 'EmployeeController@dashboard')->name('emp.dashboard');
});