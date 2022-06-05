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

Route::get('/home', function(){
    return view('home');
});

Route::get('/corsi', function(){
    return view('corsi');
});

Route::get('/account', function(){
    return view('account');
});

Route::get('/login',"App\Http\Controllers\loginController@login")->name('login');
Route::get('/logout', "App\Http\Controllers\loginController@logout"); //VEDI
//viene chiamato quando invio il form
Route::post("/login", "App\Http\Controllers\loginController@checkLogin"); //VEDI


Route::get('/registrazione', "App\Http\Controllers\RegController@registrazione")->name('registrazione');//VEDI
//viene chiamato quando invio il form
Route::post('/registrazione',"App\Http\Controllers\RegController@insert");
//vengono chiamati col javascript
Route::get('/registrazione/username/{username}',"App\Http\Controllers\RegController@checkUsername");
Route::get('/registrazione/email/{email}',"App\Http\Controllers\RegController@checkEmail");


Route::get('/corsi', "App\Http\Controllers\CorsiController@corsi");
Route::get('/corsi_load', "App\Http\Controllers\CorsiController@carica");
Route::get('/comanda_like/{nome_corso}', "App\Http\Controllers\CorsiController@comanda_like");
Route::get('/aggiungi_corso/{nome_corso}', "App\Http\Controllers\CorsiController@aggiungi_corso");
Route::get('/togli_corso/{nome_corso}', "App\Http\Controllers\CorsiController@togli_corso");

Route::get('/account', "App\Http\Controllers\AccountController@account");
Route::get('/account_load', "App\Http\Controllers\AccountController@carica");

Route::get('/load_preferiti', "App\Http\Controllers\HomeController@load_preferiti");
Route::get('/load_comments', "App\Http\Controllers\HomeController@load_comments");
Route::get('/carica_commento/{commento}', "App\Http\Controllers\HomeController@carica_commento");
Route::get('/generate_exercise', "App\Http\Controllers\HomeController@generate_exercise");
Route::get('/spotify_track/{track}', "App\Http\Controllers\HomeController@spotify_track");