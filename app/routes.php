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

Route::get('/', 'TodolistController@showTodo');
Route::post('/', 'TodolistController@showTodo');

Route::post('newtodo', 'TodolistController@addTodo');

Route::post('updatetodo', 'TodolistController@updateTodo');

