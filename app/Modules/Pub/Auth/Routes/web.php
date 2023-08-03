<?php

Route::group(['prefix' => 'auths', 'middleware' => []], function () {
    Route::get('login', 'LoginController@ShowLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');

});
