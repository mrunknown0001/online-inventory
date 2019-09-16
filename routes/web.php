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


	// Remove user
	Route::get('/user/remove/{id}', 'UserController@removeUser')->name('remove.user');

	// All users
	Route::get('/all/users', 'UserController@all')->name('all.users');


	// Transaction
	Route::get('/transactions', 'TransactionController@index')->name('transactions');


	// All Transactions
	Route::get('/all/transactions', 'TransactionController@allTransactions')->name('all.transactions');


	// Audit Trail
	Route::get('/audit-trail', 'AdminController@auditTrail')->name('audit.trail');

	// All audit trail logs
	Route::get('/all/audit-trail', 'AdminController@logs')->name('all.logs');


	// customers
	Route::get('/customers', 'CustomerController@index')->name('customers');

	// All Customers
	Route::get('/all/customers', 'CustomerController@all')->name('all.customers');

	// Suppliers
	Route::get('/suppliers', 'SupplierController@index')->name('suppliers');

	// Items

	// All Items

	// Item Categories
	Route::get('/item-categories', 'ItemCategoryController@index')->name('item.categories');

	// Farms
	Route::get('/farms', 'FarmController@index')->name('farms');

	// Municipalities
	Route::get('/municipalities', 'MunicipalityController@index')->name('municipalities');

	// All Municipalities
	Route::get('/all/municipalities', 'MunicipalityController@all')->name('all.municipalities');

	// View municipality
	Route::get('/municipality/info/{id}', 'MunicipalityController@municipalityInfo')->name('view.municipality.info');

	// Barangays
	Route::get('/barangays', 'BarangayController@index')->name('barangays');

	// All Barangays
	Route::get('/all/barangays', 'BarangayController@all')->name('all.barangays');

	// Species
	Route::get('/species', 'SpecyController@index')->name('species');

	// Animals
	Route::get('/animals', 'AnimalController@index')->name('animals');

	// Breeds
	Route::get('/breeds', 'BreedController@index')->name('breeds');

	// Unit of Measurement
	Route::get('/unit-of-measurement', 'UnitOfMeasurementController@index')->name('unit.of.measurements');
});



/***********************
* Employee Route Group *
************************/
Route::group(['prefix' => 'emp', 'middleware' => ['employee', 'prevent-back-history']], function () {
	Route::get('/dashboard', 'EmployeeController@dashboard')->name('emp.dashboard');

	// Inventory
});



/**
 * Common Link
 */
Route::group(['middleware' => 'auth'], function () {
	// Public Information
	Route::get('/public/information', 'PublicInfoController@index')->name('public.info');
});