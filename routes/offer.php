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
Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::group(['prefix' => 'offer'], function () {
            // bs w at3aml hena 3ady gdan wla fe ay moshkla aknu msh mwgod asln !!

            Route::get('', 'Offer\OfferController@index');
            Route::get('/create', 'Offer\OfferController@create');
            Route::post('/store', 'Offer\OfferController@store')->name('store');
            Route::get('/edit/{id}', 'Offer\OfferController@edit');
            Route::get('/update/{id}', 'Offer\OfferController@update');
            Route::get('/video', 'Offer\OfferController@getVideo');

        });
    });

###################################ajax offer##############################################

Route::prefix('ajax-offers')->group(function () {

    Route::get('/create', 'Offer\OfferController@create');
    Route::post('/store', 'Offer\OfferController@store')->name('store_offer');
    Route::get('/all', 'Offer\OfferController@index')->name('all');
    Route::post('/delete', 'Offer\OfferController@deleteOffer')->name('delete');
    Route::get('/edit/{id}', 'Offer\OfferController@editOffer');
    Route::post('/update',  'Offer\OfferController@updateOffer');
});
