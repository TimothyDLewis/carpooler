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

Route::get("/test", function(){
	
});

Route::get("/", "DefaultController@getIndex");

Route::group([], function(){
	Route::get("/login", "AuthController@getLogin");
	Route::post("/login", "AuthController@postLogin");

	Route::any("/logout", "AuthController@anyLogout");
});