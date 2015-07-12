<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'HomeController@index');
Route::get('/', function() {
	echo URL::to('/');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'dashboard'], function()
{
    Route::group(['prefix' => 'admin'], function()
    {
    	// Route Admin Pusat Lists
		Route::get('pusat', [
			'middleware' => 'role:adminpusat',
			'uses'       => 'AdminPusat\AdminPusatController@index'
		]);


    	// Route Admin Daerah Lists
		Route::get('daerah', [
			'middleware' => 'role:admindaerah',
			'uses'       => 'AdminDaerah\AdminDaerahController@index'
		]);
	});

	Route::group(['prefix' => 'users'], function()
    {
		Route::get('/', [
			'middleware' => 'role:anggota',
			'uses'       => 'Anggota\AnggotaController@index'
		]);
	});
});