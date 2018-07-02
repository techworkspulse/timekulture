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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'GeneralController@registration')->name('register');
Route::post('/createPlayer', 'GeneralController@createPlayer')->name('createPlayer');
Route::get('/game', 'GeneralController@game')->name('game');
Route::post('/storeMatchData', 'GeneralController@storeMatchData')->name('storeMatchData');
Route::get('/getPuzzleId/{token}', 'GeneralController@getPuzzleId')->name('getPuzzleId');
Route::post('/storeMatchLog', 'GeneralController@storeMatchLog')->name('storeMatchLog');
Route::post('/calculatePoints', 'GeneralController@calculatePoints')->name('calculatePoints');
