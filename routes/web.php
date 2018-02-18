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

Route::get('/', 'UserController@index');
Route::get('user/{id}', 'UserController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clients', 'ClientsController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('api/customer/{id}', 'Api\CustomerController@show');

Route::get('api/customers/', 'Api\CustomerController@index');
Route::get('api/customers/{skip}/', 'Api\CustomerController@index');
Route::get('api/customers/{skip}/{limit}', 'Api\CustomerController@index');

Route::get('api/letter_types/', 'Api\Letter_typeController@index');

Route::get('api/letters/pdf', 'Api\LetterController@downloadPDF');
Route::post('api/letters/provide/', 'Api\LetterController@provide')->middleware('auth');


Route::get('api/letters/', 'Api\LetterController@index');
Route::get('api/letters/{customer_id}', 'Api\LetterController@index');
Route::get('api/letters/{customer_id}/{letter_type_id}', 'Api\LetterController@index');


Route::post('api/letters/','Api\LetterController@store')->middleware('auth');

