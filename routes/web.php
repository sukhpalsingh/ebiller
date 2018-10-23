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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('bills', 'BillController');
Route::resource('bill-categories', 'BillCategoryController');
Route::resource('accounts', 'AccountController');
Route::resource('files', 'FileController');

Auth::routes();