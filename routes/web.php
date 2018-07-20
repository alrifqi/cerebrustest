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

#Route::get('/', function () {
#    return view('welcome');
#});

Route::get('/', ['as' => 'frontend.index', 'uses' => 'FrontController@getIndex']);

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
  Route::get('/backend', ['as' => 'backend.index', 'uses' => 'BackendController@getIndex']);
  Route::get('/backend/add', ['as' => 'backend.add', 'uses' => 'BackendController@getAdd']);
  Route::post('/backend/create', ['as' => 'backend.create', 'uses' => 'BackendController@postCreate']);
});

#Route::get('/home', 'HomeController@index')->name('home');
