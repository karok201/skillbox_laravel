<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('staticPages.about');
});

Route::get('/', 'App\Http\Controllers\ArticlesController@index');
Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@create');
Route::get('/admin/feedback', 'App\Http\Controllers\ContactsController@index');

Route::post('/', 'App\Http\Controllers\ArticlesController@store');
Route::post('/contacts', 'App\Http\Controllers\ContactsController@store');

Route::get('/articles/{slug}', 'App\Http\Controllers\ArticlesController@show');

