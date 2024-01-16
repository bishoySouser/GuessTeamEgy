<?php

use App\Routes\Route;

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@store');
Route::put('/', 'HomeController@update');
Route::delete('/', 'HomeController@delete');