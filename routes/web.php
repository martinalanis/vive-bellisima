<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){

	Route::get('verify-email', 'UserController@verifyEmail');

	Route::resource('usuarios', 'UserController');
			// ->names([
			// 	'create' => 'usuarios.nuevo',
			// 	'create' => 'usuarios.nuevo',
			// ]);

});
