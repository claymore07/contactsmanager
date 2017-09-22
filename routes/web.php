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

Route::post('groups/store',['uses'=>'GroupsController@store', 'as'=>'groups.store']);
Route::post('email/store',['uses'=>'EmailsController@store', 'as'=>'emails.store']);
Route::get('/contacts/autoComplete',['uses'=>'ContactsController@autoComplete', 'as'=>'contacts.autoComplete']);
Route::post('contacts/validation',['uses'=>'ContactsController@contactFormValidation', 'as'=>'contacts.validation']);
Route::resource('/contacts', 'ContactsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
