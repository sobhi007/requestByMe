<?php


Route::namespace('News')->group(function(){


    Route::resource('news', 'NewsController');

});
