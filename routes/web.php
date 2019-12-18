<?php

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
    return view('welcome');
});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/{id}/delete','HomeController@destroy')->name('user.destroy');

// All Routes about Employees
Route::get('/employees', 'EmployeeController@index')->name('employees.index');
Route::get('/employees/{id}/edit','EmployeeController@edit')->name('employees.edit');
Route::get('/employees/{id}/delete','EmployeeController@destroy')->name('employees.destroy');
Route::get('/create','EmployeeController@create')->name('employees.create');
Route::post('/create','EmployeeController@store')->name('employees.store');
Route::post('/employee/update','EmployeeController@update')->name('employees.update');

// All Routes about Companyes
Route::get('/company', 'CompanyController@index')->name('company.index');
Route::get('/company/{id}/edit','CompanyController@edit')->name('company.edit');
Route::get('/company/{id}/delete','CompanyController@destroy')->name('company.destroy');
Route::get('/compCreate','CompanyController@create')->name('company.create');
Route::post('/compCreate','CompanyController@store')->name('company.store');
Route::post('/company/update','CompanyController@update')->name('company.update');
