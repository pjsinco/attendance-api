<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/v1'], function () {

  Route::group(['prefix' => 'mlb'], function() {

    Route::get('/attendance', 'GamesController@index');

    //Route::get('/venues/{abbrev?}', 'StadiumsController@index');
    //Route::get('/venues/{id}', 'StadiumsController@show');

    Route::get('/teams/{abbrev?}', 'TeamsController@index');

  });

  //Route::group(['prefix' => 'mls'], function() {
    //Route::get('/venues', 'StadiumsController@index');
  //});
  
  //Route::group(['prefix' => 'nfl'], function() {
    //Route::get('/venues', 'StadiumsController@index');
  //});

  //Route::group(['prefix' => 'nba'], function() {
    //Route::get('/venues', 'StadiumsController@index');
  //});

  //Route::group(['prefix' => 'nhl'], function() {
    //Route::get('/venues', 'StadiumsController@index');
  //});
});
