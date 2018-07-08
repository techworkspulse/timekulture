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
Route::get('/', 'GeneralController@index')->name('index');

Route::get('/register', 'GeneralController@registration')->name('register');
Route::post('/createPlayer', 'GeneralController@createPlayer')->name('createPlayer');
Route::post('/updatePlayer', 'GeneralController@updatePlayer')->name('updatePlayer');
Route::get('/game', 'GeneralController@game')->name('game');
Route::post('/storeMatchData', 'GeneralController@storeMatchData')->name('storeMatchData');
Route::get('/getPuzzleId/{token}', 'GeneralController@getPuzzleId')->name('getPuzzleId');
Route::post('/storeMatchLog', 'GeneralController@storeMatchLog')->name('storeMatchLog');
Route::post('/calculatePoints', 'GeneralController@calculatePoints')->name('calculatePoints');
Route::get('/bonus', 'GeneralController@bonus')->name('bonus');
Route::post('/addExtraPoints', 'GeneralController@addExtraPoints')->name('addExtraPoints');
Route::post('/retryMatch', 'GeneralController@retryMatch')->name('retryMatch');
Route::get('/scoreboard', 'GeneralController@scoreboard')->name('scoreboard');
Route::post('/getExtraPoints', 'GeneralController@getExtraPoints')->name('getExtraPoints');
