<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Company Route
Route::get('/companies','CompanyController@index')->name('company-index');
Route::get('/companies/create','CompanyController@create')->name('company-create');
Route::post('/companies','CompanyController@store')->name('company-store');
Route::get('/companies/{id}','CompanyController@show')->name('company-show');
Route::delete('/companies/{id}','CompanyController@destroy')->name('company-delete');
Route::get('/companies/{id}/edit','CompanyController@edit')->name('company-edit');
Route::put('/companies/{id}/edit','CompanyController@update')->name('company-update');


//Employee Route
Route::get('/employees','EmployeeController@index')->name('employee-index');
Route::get('/employees/create','EmployeeController@create')->name('employee-create');
Route::post('/employees','EmployeeController@store')->name('employee-store');
Route::get('/employees/{id}','EmployeeController@show')->name('employee-show');
Route::delete('/employees/{id}','EmployeeController@destroy')->name('employee-delete');
Route::get('/employees/{id}/edit','EmployeeController@edit')->name('employee-edit');
Route::put('/employees/{id}/edit','EmployeeController@update')->name('employee-update');