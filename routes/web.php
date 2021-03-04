<?php

use Illuminate\Support\Facades\Route;

use App\Models\Company;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $companies = Company::orderBy('created_at','desc')->paginate(5);
    return view('welcome', compact('companies'));
});


Auth::routes();
Route::put('/profile/update', 'HomeController@update')->name('employee.update.profile');
Route::get('/home', 'HomeController@dashboard')->name('employee.dashboard');
