<?php
use Illuminate\Support\Facades\Mail;
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('new-user', 'TechnicienController@newTech');
Route::post('new-user', 'TechnicienController@registerTech');

//Dashboard...
Route::get('/dashboard', 'DashboardController@showDashboard');


//Client...
Route::get('/clients', 'ClientsController@index');
Route::post('/clients', 'ClientsController@handleAction');

//Suppliers...
Route::get('/suppliers', 'SuppliersController@index');
Route::post('/suppliers', 'SuppliersController@handleAction');
Route::get('/suppliers/{id}', 'SuppliersController@supplierDetails')->where('id', '[0-9]*');

//Category + Brand
Route::get('/category-model', 'CategoryController@index');
Route::post('/category-model', 'CategoryController@handleAction');

//Articles
Route::get('/articles', 'ArticleController@index');
Route::post('/articles', 'ArticleController@handleAction');

//Models
Route::get('/modele', 'ModelesController@index');
Route::post('/modele', 'ModelesController@handleAction');

//Devices
Route::get('/devices', 'DevicesController@index');
Route::post('/new-file/devices', 'DevicesController@handleAction');


//Technicien = USER
Route::get('/technicien/notes', 'TechnicienController@notes');
Route::post('/technicien/notes', 'TechnicienController@handleAction');
Route::get('/profile', 'TechnicienController@getFormEdit');


//STATUS....
Route::get('/status/groups', 'GroupStatusController@index');
Route::post('/status/groups', 'GroupStatusController@handleAction');
Route::get('/status/codes', 'CodeStatusController@index');
Route::post('/status/codes', 'CodeStatusController@handleAction');


//Files...
Route::get('/files', 'FilesController@index'); // OK

//..//Repair
    Route::get('/file/repair/{id}', 'FilesController@editRepair')->where('id', '[0-9]*'); // OK
    Route::post('/file/repair/{id}', 'FilesController@updateRepair')->where('id', '[0-9]*'); // OK
    Route::delete('/file/repair/{id}', 'FilesController@deleteRepair')->where('id', '[0-9]*'); // OK
    Route::get('/invoice/repair/{id}', 'FilesController@invoiceRepair')->where('id', '[0-9]*'); // OK


//..//order
    Route::get('/file/order/{id}', 'FilesController@editOrder')->where('id', '[0-9]*'); // OK
    Route::post('/file/order/{id}', 'FilesController@updateOrder')->where('id', '[0-9]*'); // OK
    Route::delete('/file/order/{id}', 'FilesController@deleteOrder')->where('id', '[0-9]*'); // OK
    Route::get('/invoice/order/{id}', 'FilesController@invoiceOrder')->where('id', '[0-9]*'); // OK
    Route::get('/form/order/{id}', 'FilesController@formOrder')->where('id', '[0-9]*'); // OK
//..//file
    Route::post('/file/{id}', 'FilesController@handleFile')->where('id', '[0-9]*'); // OK
    Route::post('/file', 'FilesController@searchFile'); // OK

//File
Route::get('/create/file/{id}', 'FilesController@createFile')->where('id', '[0-9]*');
Route::post('/create/file', 'FilesController@handleAction');

//Autocomplete
Route::post('/autocomplete', 'AutocompleteController@index');

