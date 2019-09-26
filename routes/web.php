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

	// add customer
	Route::get('/customer/add', 'CustomerController@addCustomer')->name('add.customer');

	// view customer
	Route::get('/customer/info/{id}', 'CustomerController@viewCustomer')->name('view.customer');

	// update customer
	
	// remove customer 
	Route::get('/customer/remove/{id}', 'CustomerController@removeCustomer')->name('remove.customer');

	// store customer
	Route::post('/customer/add', 'CustomerController@storeCustomer')->name('store.customer');

	// All Customers
	Route::get('/all/customers', 'CustomerController@all')->name('all.customers');

	// Suppliers
	Route::get('/suppliers', 'SupplierController@index')->name('suppliers');

	// add supplier
	Route::get('/supplier/add', 'SupplierController@addSupplier')->name('add.supplier');
	
	// store supplier
	Route::post('/supplier/add', 'SupplierController@storeSupplier')->name('store.supplier');

	// view supplier

	// update supplier

	// remove supplier

	// all suppliers
	Route::get('/all/suppliers', 'SupplierController@all')->name('all.suppliers');

	// Items
	Route::get('/items', 'ItemController@index')->name('items');

	// Add item
	Route::get('/item/add', 'ItemController@addItem')->name('add.item');

	// store Item
	Route::post('/item/add', 'ItemController@storeItem')->name('store.item');

	// view item details

	// All Items
	Route::get('/all/items', 'ItemController@all')->name('all.items');

	// Item Categories
	Route::get('/item-categories', 'ItemCategoryController@index')->name('item.categories');

	// all item categories
	Route::get('/all/item-categories', 'ItemCategoryController@all')->name('all.item.categories');

	// add item category
	Route::get('/item-category/add', 'ItemCategoryController@addItemCategory')->name('add.item.category');

	// store item category
	Route::post('/item-category/add', 'ItemCategoryController@storeItemCategory')->name('store.item.category');

	// Farms
	Route::get('/farms', 'FarmController@index')->name('farms');

	// All Farms
	Route::get('/all/farms', 'FarmController@all')->name('all.farms');

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

	// Add Species
	Route::get('/species/add', 'SpecyController@addSpecies')->name('add.species');

	// Store Species
	Route::post('/species/add', 'SpecyController@storeSpecies')->name('store.species');


	// All Species
	Route::get('/all/species', 'SpecyController@all')->name('all.species');

	// Animals
	Route::get('/animals', 'AnimalController@index')->name('animals');

	// All Animals
	Route::get('/all/animals', 'AnimalController@all')->name('all.animals');

	// Breeds
	Route::get('/breeds', 'BreedController@index')->name('breeds');

	// All Breeds
	Route::get('/all/breeds', 'BreedController@all')->name('all.breeds');

	// Unit of Measurement
	Route::get('/unit-of-measurements', 'UnitOfMeasurementController@index')->name('unit.of.measurements');

	// add unit of measurement
	Route::get('/unit-of-measurement/add', 'UnitOfMeasurementController@addUnitOfMeasurement')->name('add.unit.of.measurement');

	// store
	Route::post('/unit-of-measurement/add', 'UnitOfMeasurementController@storeUnitofMeasurement')->name('store.unit.of.measurement');


	// All unit of measurements
	Route::get('/all/unit-of-measurements', 'UnitOfMeasurementController@all')->name('all.unit.of.measurements');
});



/***********************
* Employee Route Group *
************************/
Route::group(['prefix' => 'emp', 'middleware' => ['employee', 'prevent-back-history']], function () {
	Route::get('/dashboard', 'EmployeeController@dashboard')->name('emp.dashboard');

	// Inventory Management
	Route::get('/inventory', 'InventoryController@index')->name('inventories');

	// Add Inventory Entry
	Route::get('/inventory/entry', 'InventoryController@itemEntry')->name('item.entry');

	// Store Item Entry
	Route::post('/inventory/entry', 'InventoryController@storeItemEntry')->name('store.item.entry');

	// all inventory
	Route::get('/all/inventories', 'InventoryController@all')->name('all.inventories');
});



/**
 * Common Link
 */
Route::group(['middleware' => 'auth'], function () {

	// Inventory Management
	Route::get('/inventory', 'InventoryController@index')->name('inventories');

	// Add Inventory Entry
	Route::get('/inventory/entry', 'InventoryController@itemEntry')->name('item.entry');

	// Store Item Entry
	Route::post('/inventory/entry', 'InventoryController@storeItemEntry')->name('store.item.entry');


	// Outgoing entry
	Route::get('/inventory/outgoing', 'InventoryController@outgoingItem')->name('item.outgoing');

	// Store Outing Item
	Route::post('/inventory/outgoing', 'InventoryController@storeOugoingItem')->name('store.outgoing.item');

	// all inventory
	Route::get('/all/inventories', 'InventoryController@all')->name('all.inventories');


	// Shipping Permit
	Route::get('/shipping-permit', 'ShippingPermitController@index')->name('shipping.permits');

	// All Shipping Permits
	Route::get('/all/shipping-permits', 'ShippingPermitController@all')->name('all.shipping.permits');

	// Public Information
	Route::get('/public/information', 'PublicInfoController@index')->name('public.info');


	// All public info
	Route::get('/all/public/information', 'PublicInfoController@all')->name('all.public.info');

});