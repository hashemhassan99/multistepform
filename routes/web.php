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
    return view('index');
});
Route::get('/employees','EmployeeController@index')->name('all_employees');
Route::get('/create_employee','EmployeeController@create')->name('create_employees');
Route::post('/store_employee','EmployeeController@store')->name('store_employees');
Route::get('/edit_employee/{employee_id}','EmployeeController@edit')->name('edit_employee');
Route::put('/update_employee/{employee_id}','EmployeeController@update')->name('update_employee');
Route::delete('/delete_employee/{employee_id}','EmployeeController@destroy')->name('delete_employee');


Route::get('/{page}', 'AdminController@index');
