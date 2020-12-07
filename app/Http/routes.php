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

Route::get('/','pagesController@index');
Route::get('/about','pagesController@about');
Route::get('/services','pagesController@services');

Route::resource('post','postController');


Route::auth();

Route::get('/dashboard', 'DashboardController@index');
