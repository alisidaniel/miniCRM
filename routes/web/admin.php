<?php

Route::get('/login', 'Auth\LoginController@login')->name('admin.login');
Route::post('/login', 'Auth\LoginController@loginAction')->name('admin.login.submit');
Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

Route::group(['middleware' => 'auth:admin'], function() {

    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

});