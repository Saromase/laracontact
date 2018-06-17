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

Route::prefix('contact')->group(function () {
  Route::get('/' , 'ContactController@index')->name('contact.index');
  Route::get('/add/' , 'ContactController@add')->name('contact.add');
  Route::post('/add/' , 'ContactController@store')->name('contact.store');
  Route::get('/edit/{id}' , 'ContactController@edit')->name('contact.edit');
  Route::post('/edit/{id}' , 'ContactController@update')->name('contact.update');
});

Route::prefix('group')->group(function () {
  Route::get('/' , 'GroupController@index')->name('group.index');
  Route::get('/add/' , 'GroupController@add')->name('group.add');
  Route::post('/add/' , 'GroupController@store')->name('group.store');
  Route::get('/edit/{id}' , 'GroupController@edit')->name('group.edit');
  Route::post('/edit/{id}' , 'GroupController@update')->name('group.update');

});
