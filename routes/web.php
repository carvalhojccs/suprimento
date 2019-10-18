<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::any('unidades/search','UnidadeController@search')->name('unidades.search');
    Route::resource('unidades','UnidadeController');
    
    Route::get('imports','CsvFile@index')->name('imports');
    Route::post('imports','CsvFile@csv_import')->name('imports');
    
    
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
