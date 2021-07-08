<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@checkLogin');
Route::get('logout', 'LoginController@logout');

Route::get('home', 'HomeController@home');

Route::get('welcome', 'WelcomeController@welcome');

Route::get('signup', 'SignupController@signup');
Route::post('signup', 'SignupController@aggiungi');

Route::get('carrello', 'CarrelloController@carrello');

Route::get('ordini', 'OrdiniController@ordini');

Route::get('CaricaProdotti', 'ProdottiController@carica');
Route::get('AggiungiCarrello/{id}', 'AggiungiCarrelloController@aggiungi');
Route::get('ModalFill/{id}', 'ModalBoxController@riempi');
Route::get('ReviewsFill/{id}', 'ModalBoxController@reviews');
Route::get('AddComment/{id}&{c}','ModalBoxController@addReview');

Route::get('caricaCarrello', 'CarrelloController@caricaCarrello');
Route::get('rimuoviDalCarrello/{id}', 'CarrelloController@rimuoviDalCarrello');
Route::get('confermaOrdine/{c}', 'CarrelloController@conferma');

Route::get('checkOrdini', 'OrdiniController@check');
Route::get('contaOrdini', 'OrdiniController@conta');

/*Route::get('AggiungiCarrello/{id}', function ($id) {
    return $id;
});*/