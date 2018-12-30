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

Route::get('/index', 'HomeController@home');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UserController');
Route::resource('temas','TemaController');
Route::resource('postagems','PostagemController');
Route::resource('respostas','RespostaController');

Route::get('/users/{id}/postagens','PostagemController@postagems');
