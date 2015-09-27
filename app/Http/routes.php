<?php

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Dashboard...
Route::get('/dashboard', 'DashboardController@showDashboard');

Route::get('/profile', 'TechnicienController@getFormEdit');

Route::get('/clients', 'ClientsController@index');
Route::post('/clients', 'ClientsController@handleAction');


Route::get('/modele', 'ModelesController@index');
Route::post('/modele', 'ModelesController@handleAction');

