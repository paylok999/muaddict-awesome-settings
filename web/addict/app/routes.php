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

/*Route::get('/', function()
{
	return View::make('hello');
});*/

Route::get('/', 'Home@showIndex');
Route::get('test', 'Home@testmethod');
Route::get('/register', 'Home@showIndex');
Route::post('register', 'Register@addUser');
//Route::get('pluscoin', 'Register@addCoin');
//Route::get('oldlogin', 'Register@changeOldPassword');
//Route::get('addseals/{username}', 'Register@addseals');
Route::get('addseals/1day', 'Register@add1DaySetOfSeals');
Route::post('authenticate', 'Authenticate@login');
Route::get('logout', 'Authenticate@logout');
Route::get('character/rankings/{order?}', 'Character@getTop');
Route::get('character/rankings2015/{order?}', 'Character@get2015TopPlayer');
Route::get('character/bloodcastle', 'Character@getBloodCastleRankings');

/*authenticated user */
Route::group(array('before' => 'auth'), function()
{
	Route::post('account/changepassword', 'Account@changePassword');
	Route::get('account/character/{charname}', 'Account@getCharacterDetails');
	Route::get('account/characters', 'Account@getAllCharacter');
	Route::get('account/coins', 'Account@getCoinTransferForm');
	Route::post('account/coins', 'Account@transferCoin');
	Route::post('/account/msreset', 'Account@resetMSReset');
	Route::post('/account/statreset', 'Account@resetStats');
	Route::post('/account/unstock', 'Account@unstockCharacter');
	
	/*shopping*/
	Route::get('/shop', 'Shop@show');
	Route::post('/shop', 'Shop@addCart');
	Route::get('/shop/checkout', 'Shop@getAllItemsByUsername');
	Route::delete('/shop/delete', 'Shop@deleteItem');
	/*response*/
	Route::get('/shop/checkout/cancel', 'Shop@cancel');
	Route::get('/shop/checkout/complete', 'Shop@complete');
});


App::missing(function($exception)
{
	return Redirect::to('/');
	
});
