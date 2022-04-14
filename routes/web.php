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

Route::get('/', 'FellowController@index');

Route::post('/create', 'FellowController@create');

Route::post('/fellow', 'FellowController@name');

Route::get('/fellows/{id}/delete', 'FellowController@delete');

Route::get('/fellows/{id}/edit', 'FellowController@edit');

Route::put('/fellows/{id}/updtate', 'FellowController@update');
