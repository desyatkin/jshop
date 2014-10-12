<?php


if(Auth::check()) {
    Route::get('/', function () {
            return Redirect::to('/items');
    });
} else Route::get('/', 'HomeController@index');

/**
 * Регистрация
 */
Route::get('login', function() {
    return Redirect::to('/signin');
});
Route::resource('signup', 'SignupController');
Route::resource('signin', 'SigninController');
Route::get('logout', 'SigninController@logout');


/**
 * Защищено авторизацией
 */
Route::group(['before' => 'auth'], function(){
    /**
     * Покупки
     */
    Route::resource('items', 'ItemsController');
});

