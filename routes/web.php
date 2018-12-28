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
Route::resource('expenses', 'ExpenseController');
Route::resource('accounts', 'AccountController');
Route::resource('preferences', 'PreferencesController');


Route::get('accounts/{accountId}/transactions/import/create', 'AccountTransactionController@importCreate');
Route::post('accounts/{accountId}/transactions/import', 'AccountTransactionController@import');
Route::resource('accounts.transactions', 'AccountTransactionController');
Route::resource('files', 'FileController');

Auth::routes();