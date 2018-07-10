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

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/cadastrarQuestoes', 'questoesController@cadastrar')->name('cadastrarQuestoes');

Route::any('/listarQuestoes', 'questoesController@listarPerguntas')->name('listarQuestoes');

Route::any('/responderQuestoes/{id}', 'questoesController@votar')->name('responderQuestoes');

Route::any('/listarResultados', 'questoesController@listarResultados')->name('listarResultados');

Route::any('/editarQuestoes', 'questoesController@editarQuestao')->name('editarQuestionario');

Route::any('/deletarQuestoes', 'questoesController@deletarQuestao')->name('deletarQuestionario');

Route::any('/cadastrarPostagens', 'PostagensController@cadastrarPostagem')->name('cadastrarPostagens');

Route::any('/', 'PostagensController@listarPostagens')->name('listarPostagens');

Route::any('/editarPostagens', 'PostagensController@editarPostagem')->name('editarPostagens');

Route::any('/deletarPostagens', 'PostagensController@deletarPostagem')->name('deletarPostagem');