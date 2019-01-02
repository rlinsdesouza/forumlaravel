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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UserController');
Route::resource('temas','TemaController');
Route::resource('postagems','PostagemController');
Route::resource('respostas','RespostaController');

Route::get('/users/{id}/postagens','UserController@postagems');

Route::get('/temas','TemaController@cadastrotema');
Route::post('/temas/add','TemaController@addtema');

Route::post('/postagens/addresposta','RespostaController@addresposta');

Route::post('/postagens/criar','PostagemController@store');
Route::post('/postagens/addlike','PostagemController@addlike');
Route::get('/postagens/listargeral','PostagemController@listageral');
Route::get('/postagens/buscatitulo','PostagemController@buscanome');
Route::get('/postagens/{id}','PostagemController@show');
Route::get('/postagens/{id}/listar','PostagemController@listaporuser');
Route::post('/postagens/excluir/{id}','PostagemController@excluir');




