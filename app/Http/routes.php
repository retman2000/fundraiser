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

Route::post('/fundraisers/store', 'FundraiserController@store');
Route::post('/comments/store', 'CommentController@store');

Route::resource('fundraisers', 'FundraiserController');
Route::get('/fundraisers', 'FundraiserController@create');
Route::get('/fundraisers/{id}', 'FundraiserController@show');

Route::resource('comments', 'CommentController');
Route::get('/fundraisers/{id}/comments', 'CommentController@create');

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/',     'HomeController@index');
