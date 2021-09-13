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

//  Auth::routes(['verify'=>'true']);
// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::prefix(LaravelLocalization::setLocale())->
// dah ely hyktbli ar aw en abl el route bta3y
    middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->
    //dah lazmtu eni law shelt el ar aw el en min el link hy7othalii
    group(function () {
    // bs w at3aml hena 3ady gdan wla fe ay moshkla aknu msh mwgod asln !!
   
    Auth::routes(['verify' => 'true']);
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
});
