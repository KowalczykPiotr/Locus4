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

Route::get('/letters', 'LettersController@index');
Route::get('/letters_modal/{tab}', 'LetterModalController@index');

Route::get('admin/clients/', 'Admin\ClientsController@index')->middleware('auth');
Route::post('admin/clients/', 'Admin\ClientsController@index')->middleware('auth');
Route::get('admin/clients/add', 'Admin\ClientsController@add')->middleware('auth');
Route::post('admin/clients/save', 'Admin\ClientsController@save')->middleware('auth');

Route::get('admin/clients/view/{id}', 'Admin\ClientsController@view')->middleware('auth');
Route::get('admin/clients/edit/{id}', 'Admin\ClientsController@edit')->middleware('auth');
Route::post('admin/clients/update', 'Admin\ClientsController@update')->middleware('auth');

Route::get('admin/clients/delete/{id}', 'Admin\ClientsController@delete')->middleware('auth');


Route::get('admin/clients/{skip}', 'Admin\ClientsController@index')->middleware('auth');


Route::get('admin/customer-groups/', 'Admin\CustomerGroupsController@index')->middleware('auth');
Route::get('admin/customer-groups/add/', 'Admin\CustomerGroupsController@add')->middleware('auth');
Route::post('admin/customer-groups/save/', 'Admin\CustomerGroupsController@save')->middleware('auth');
Route::get('admin/customer-groups/delete/{id}', 'Admin\CustomerGroupsController@delete')->middleware('auth');
Route::get('admin/customer-groups/edit/{id}', 'Admin\CustomerGroupsController@edit')->middleware('auth');
Route::post('admin/customer-groups/update/', 'Admin\CustomerGroupsController@update')->middleware('auth');

Route::get('admin/letter-types/', 'Admin\LetterTypesController@index')->middleware('auth');
Route::get('admin/letter-types/add/', 'Admin\LetterTypesController@add')->middleware('auth');
Route::post('admin/letter-types/save/', 'Admin\LetterTypesController@save')->middleware('auth');
Route::get('admin/letter-types/delete/{id}', 'Admin\LetterTypesController@delete')->middleware('auth');
Route::get('admin/letter-types/edit/{id}', 'Admin\LetterTypesController@edit')->middleware('auth');
Route::post('admin/letter-types/update/', 'Admin\LetterTypesController@update')->middleware('auth');



Route::get('api/customer/{id}', 'Api\CustomerController@show');

Route::get('api/customers/', 'Api\CustomerController@index');
Route::get('api/customers/{skip}/', 'Api\CustomerController@index');
Route::get('api/customers/{skip}/{limit}', 'Api\CustomerController@index');

Route::get('api/letter_types/', 'Api\Letter_typeController@index');

Route::post('api/letters/provide/', 'Api\LetterController@provide')->middleware('auth');
Route::post('api/letters/mail','Api\LetterController@mail')->middleware('auth');
Route::post('api/letters/','Api\LetterController@store')->middleware('auth');

Route::get('api/letters/', 'Api\LetterController@index');
Route::get('api/letters/{customer_id}', 'Api\LetterController@index');
Route::get('api/letters/{customer_id}/{letter_type_id}', 'Api\LetterController@index');


