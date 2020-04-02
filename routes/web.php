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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/opening', function () {
    return view('opening.opening');
});

Route::get('/op2', 'OpeningCController@index');

Route::get('/adminIndex', 'AdminController@index')->name('adminIndex');
Route::get('/adminShow/{id}', 'AdminController@show')->name('adminShow');
Route::get('/adminCreate', 'AdminController@create')->name('adminCreate');
Route::post('/adminStore', 'AdminController@store')->name('adminStore');
Route::get('/adminEdit/{id}', 'AdminController@edit')->name('adminEdit');
Route::post('/adminUpdate/{id}', 'AdminController@update')->name('adminUpdate');
