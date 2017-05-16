<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('', ['uses' => 'SlackinController@index', 'as' => 'slackin.index']);
    Route::post('', ['uses' => 'SlackinController@invite', 'as' => 'slackin.invite']);
});