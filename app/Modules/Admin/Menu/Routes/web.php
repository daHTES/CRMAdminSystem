<?php

Route::group(['prefix' => 'menus', 'middleware' => []], function () {
    Route::get('/', 'MenuController@index')->name('menus.index');
});
