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


Route::group(['middleware' => ['web']], function(){
	
	Route::get('/', [
	'uses' => 'eafwprojectController@getHome',
	'as' => 'home'
	]);

	Route::get('/about', [
		'uses' => 'eafwprojectController@getAbout',
		'as' => 'about'
		]);

	Route::get('/help', [
		'uses' => 'eafwprojectController@getHelp',
		'as' => 'help'
		]);


	Route::group(['prefix' => 'eafw'], function(){

	Route::get('/extensions', [
		'uses' => 'eafwprojectController@getExtensions',
		'as' => 'extensions'
		]);

	Route::get('/satoffs', [
		'uses' => 'eafwprojectController@getSatoffs',
		'as' => 'satoffs'
		]);

	Route::get('/compmails', [
		'uses' => 'eafwprojectController@getcompMails',
		'as' => 'compmails'
		]);

	Route::post('/compmailsfilt', [
		'uses' => 'eafwprojectController@filterMails',
		'as' => 'mailsfilter'		
		]);

	Route::post('/compmailsfilt2',[
		'uses' => 'eafwprojectController@filterMails2',
		'as' => 'mailsfilter2'
		]);

	});

});


Route::group(['prefix' => 'admin'], function(){

	Route::get('/login', [
		'uses' => 'eafwprojectController@goLogin',
		'as' => 'login'
		]);

	Route::get('/adminmain', [
		'uses' => 'eafwprojectController@adminMain',
		'as' => 'adminmain'
	]);

	Route::get('/employeeadd', [
		'uses' => 'eafwprojectController@employeeadd',
		'as' => 'employeeadd'
	]);

	Route::post('/add_employee', [
		'uses' => 'eafwprojectController@add_employee',
		'as' => 'add_employee'
	]);

	Route::get('/employeeedit', [
		'uses' => 'eafwprojectController@employeeedit',
		'as' => 'employeeedit'
	]);

	Route::get('/edit_employee/{id}', [
		'uses' => 'eafwprojectController@edit_employee',
		'as' => 'edit_employee'
	]);

	Route::patch('/update_employee/{id}', [
		'uses' => 'eafwprojectController@update_employee',
		'as' => 'update_employee'
	]);

	Route::patch('/testees/{id}', [
		'uses' => 'eafwprojectController@testees',
		'as' => 'testees'
	]);

});

Route::group(['prefix' => 'vehiclemovement'], function(){
	Route::get('/vmvthome', [
		'uses' => 'eafwfunctionsController@vmvthome',
		'as' => 'vmvthome'
	]);

	Route::get('/newtrip', [
		'uses' => 'eafwfunctionsController@newtrip',
		'as' => 'newtrip'
	]);

	Route::get('/newtrip2', [
		'uses' => 'eafwfunctionsController@newtrip2',
		'as' => 'newtrip2'
	]);

	Route::post('/add_newtrip', [
		'uses' => 'eafwfunctionsController@add_newtrip',
		'as' => 'add_newtrip'
	]);

	Route::post('/add_newtrip2', [
		'uses' => 'eafwfunctionsController@add_newtrip2',
		'as' => 'add_newtrip2'
	]);

	Route::get('/edit_travelplan/{id}', [
		'uses' => 'eafwfunctionsController@edit_travelplan',
		'as' => 'edit_travelplan'
	]);
});