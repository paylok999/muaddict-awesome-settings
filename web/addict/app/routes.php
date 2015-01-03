<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/', 'Home@showIndex');
Route::get('register', 'Home@showIndex');
Route::post('register', 'Register@addUser');
Route::get('pluscoin', 'Register@addCoin');
Route::post('authenticate', 'Authenticate@login');
Route::get('logout', 'Authenticate@logout');
Route::get('character/rankings/{order?}', 'Character@getTop');

/*authenticated user */
Route::group(array('before' => 'auth'), function()
{
	Route::post('account/changepassword', 'Account@changePassword');
	Route::get('account/characters', 'Account@getAllCharacter');
	Route::get('account/coins', 'Account@getCoinTransferForm');
	Route::post('account/coins', 'Account@transferCoin');
});
