<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.welcome');
})->name('home');

Route::get('/$/{sample}', 'SampleFormController@form')->middleware('auth')->name('samples.form');
Route::post( '/$/{sample}/items', 'SampleFormController@storeItems')->middleware('auth')->name('samples.storeItems');
Route::put('/$/{sample}/close', 'SampleFormController@close')->middleware('auth')->name('samples.close');
Route::get('/gifts/{code}', 'Dashboard\GiftController@all')->name('gifts.public');