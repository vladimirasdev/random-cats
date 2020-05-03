<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'IndexController@showIndex')->name('index');
Route::get('/statistics', 'StatisticsController@showStats')->name('statistics');
Route::get('/log', 'LogController@showLog')->name('log');
Route::get('/{id}', 'IndexController@showId');
