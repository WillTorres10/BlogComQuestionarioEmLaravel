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
	return redirect('home');
});
Route::get('/questoes', 'questoesController@listar' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::any('/cadastrarQuestoes', 'questoesController@cadastrar')->name('cadastrarQuestoes');

Route::any('/listarQuestoes', 'questoesController@listarPerguntas')->name('listarQuestoes');

Route::any('/responderQuestoes/{id}', 'questoesController@votar')->name('responderQuestoes');

Route::any('/listarResultados', 'questoesController@listarResultados')->name('listarResultados');
