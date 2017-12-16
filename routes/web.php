<?php
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/categories', 'CategoriesController@index');
Route::post('/categories/add', 'CategoriesController@postAdd');
Route::post('/categories/update', 'CategoriesController@postUpdate');
Route::get('/categories/delete', 'CategoriesController@getDelete');
Route::get('/changepassword', 'ChangePasswordController@getChangepassword');
Route::post('/changepassword', 'ChangePasswordController@postChangepassword');
Route::get('/users', 'UsersController@getUsers');
Route::get('/users/delete', 'UsersController@getDelete');
Route::post('/users/update', 'UsersController@postUpdate');
Route::get('/profile', 'ProfileController@getProfile');
Route::post('/profile/update', 'ProfileController@postUpdate');
//Asks
Route::get('/asks', 'AsksController@getAsks');
Route::get('/asks/myasks', 'AsksController@getMyAsks');

Route::get('/asks/myasks/add', 'AsksController@getAdd');
Route::post('/asks/myasks/add', 'AsksController@postAdd');

Route::get('/asks/myasks/update/{id}', 'AsksController@getUpdate');
Route::post('/asks/myasks/update', 'AsksController@postUpdate');

Route::get('/asks/myasks/delete', 'AsksController@getDelete');
Route::get('/asks/{id}/approved/{status}', 'AsksController@getApprovedPost');
