<?php

Route::get('/', 'HomeController@index');

Route::resource('signup', 'SignupController');
Route::resource('signin', 'SigninController');
Route::get('logout', 'SigninController@logout');
