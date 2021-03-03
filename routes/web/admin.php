<?php

Route::get('/login', 'Auth\LoginController@login')->name('admin.login');
Route::post('/login', 'Auth\LoginController@loginAction')->name('admin.login.submit');
Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

Route::group(['middleware' => 'auth:admin'], function() {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/companies', 'ManageCompanyController@view')->name('admin.show.companies');
    Route::get('/company/employee/{id}', 'ManageEmployeeController@view')->name('admin.show.empoyee');

    Route::post('/add/company', 'ManageCompanyController@store')->name('admin.create.company');
    Route::put('/update/company', 'ManageCompanyController@update')->name('admin.update.company');
    Route::get('/delete/company/{id}', 'ManageCompanyController@delete')->name('admin.delete.company');

    Route::post('/add/employee', 'ManageEmployeeController@store')->name('admin.create.employee');
    Route::put('/update/employee', 'ManageEmployeeController@update')->name('admin.update.employee');
    Route::get('/delete/employee/{id}', 'ManageEmployeeController@delete')->name('admin.delete.employee');

});