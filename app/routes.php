<?php

Route::get('/', 'HomeController@index');

/**
 * Регистрация
 */
Route::resource('signup', 'SignupController');
Route::resource('signin', 'SigninController');
Route::get('logout', 'SigninController@logout');

/**
 * Покупки
 */
Route::resource('items', 'ItemsController');
