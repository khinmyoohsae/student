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

Route::get('/home', 'HomeController@index');

Route::get('/admin/edit/', 'HomeController@show');

Route::post('/admin/update/{id}/', 'HomeController@update');

Route::get('/password/edit/', 'HomeController@change');

Route::post('/admin/recreate/{id}/', 'HomeController@recreate');







