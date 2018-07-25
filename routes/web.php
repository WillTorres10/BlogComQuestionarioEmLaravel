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

//Links relacionados ao sistema de quizs

Route::any('/cadastrarQuiz', 'quizController@cadastrar')->name('cadastrarQuiz');

Route::any('/listarQuiz', 'quizController@listarQuiz')->name('listarQuiz');

Route::any('/verQuiz/{id}', 'quizController@verQuiz')->name('verQuiz');

Route::any('/editQuiz/{id}', 'quizController@editar')->name('editQuiz');

Route::any('/deleteQuiz/{id}', 'quizController@deletar')->name('deleteQuiz');

Route::any('/resultadoQuiz/{id}', 'quizController@resultados')->name('resultadoQuiz');

Route::any('/cadastrarQuestoes/{id}', 'questoesController@cadastrar')->name('cadastrarQuestoes');

Route::any('/editarQuestoes/{quiz}/{id}', 'questoesController@editarQuestao')->name('editarQuestionario');

Route::any('/deletarQuestoes/{quiz}/{id}', 'questoesController@deletarQuestao')->name('deletarQuestionario');

//Links relacionados ao sistema de postagens

Route::any('/cadastrarPostagens', 'PostagensController@cadastrarPostagem')->name('cadastrarPostagens');

Route::any('/', 'PostagensController@listarPostagens')->name('listarPostagens');

Route::any('/editarPostagens', 'PostagensController@editarPostagem')->name('editarPostagens');

Route::any('/deletarPostagens', 'PostagensController@deletarPostagem')->name('deletarPostagem');