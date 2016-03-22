<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//resource controller for basic CRUD-functionality
Route::resource('contacts','ContactsController');

//special dispatching methods for deleting email,telephone and note entries
Route::delete('contacts/deleteEmail/{id}','ContactsController@deleteEmail');
Route::delete('contacts/deleteTel/{id}','ContactsController@deleteTel');
Route::delete('contacts/deleteNote/{id}','ContactsController@deleteNote');
//"show-contact"-dispatching when called with Delete
Route::get('contacts/del/{id}','ContactsController@showDel');

Route::get('/', function () {
    return view('welcome');
});




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
