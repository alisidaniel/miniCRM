<?php

Route::get('/login', 'Auth\LoginController@login')->name('company.login');
Route::post('/login', 'Auth\LoginController@loginAction')->name('company.login.submit');
Route::post('/logout', 'Auth\LoginController@logout')->name('company.logout');

Route::group(['middleware' => 'auth:company'], function() {
    Route::get('/', 'CompanyController@dashboard')->name('company.dashboard');

    Route::post('/add/employee', 'ManageEmployeeController@store')->name('company.create.employee');
    Route::put('/update/employee', 'ManageEmployeeController@update')->name('company.update.employee');
    Route::get('/delete/employee/{id}', 'ManageEmployeeController@delete')->name('company.delete.employee');
});