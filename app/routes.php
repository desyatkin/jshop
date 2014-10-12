<?php

Route::get('/', 'HomeController@index');

/**
 * Регистрация
 */
Route::get('login', function() {
    return Redirect::to('/signin');
});
Route::resource('signup', 'SignupController');
Route::resource('signin', 'SigninController');
Route::get('logout', 'SigninController@logout');

//notification url
Route::post('yd', 'YandexMoneyController@yd');
Route::get('yd', 'YandexMoneyController@yd');


/**
 * Защищено авторизацией
 */
Route::group(['before' => 'auth'], function(){
    /**
     * Покупки
     */
    Route::resource('items', 'ItemsController');

    Route::post('item/request', 'ItemRequestController@store');

    /**
     * Личный кабинет
     */
    Route::get('cabinet', 'CabinetController@index');

    Route::get('cabinet/edit', 'CabinetController@edit');
    Route::post('cabinet/edit', 'CabinetController@update');

    Route::get('cabinet/payment', 'CabinetController@payment');
    Route::post('cabinet/payment', 'CabinetController@payment');


});

