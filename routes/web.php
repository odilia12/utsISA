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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/contract', 'ContractController@index')->name('contract_index');
Route::post('/contract/store', 'ContractController@store')->name('contract_store');
Route::get('/contract/create', 'ContractController@create')->name('contract_create');
Route::get('/contract/{id}/edit', 'ContractController@edit')->name('contract_edit');
Route::post('/contract/{id}/update', 'ContractController@update')->name('contract_update');
Route::post('/contract/{id}/delete', 'ContractController@destroy')->name('contract_destroy');

Route::get('/contract/show/{id}', 'ContractController@show')->name('contract_show');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/main', 'MainController@index')->name('main');
Route::get('/', 'Auth\LoginController@showLoginForm');


Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');
Route::get('/schedule/show/{id}', 'ScheduleController@show')->name('schedule.show');
Route::get('/schedule/create', 'ScheduleController@create')->name('schedule.create');
Route::post('/schedule/store', 'ScheduleController@store')->name('schedule.store');
Route::get('/schedule/{id}/edit', 'ScheduleController@edit')->name('schedule.edit');
Route::post('/schedule/{id}/update', 'ScheduleController@update')->name('schedule.update');
Route::post('/schedule/{id}/delete', 'ScheduleController@destroy')->name('schedule.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
