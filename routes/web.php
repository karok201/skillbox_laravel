<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('staticPages.about');
});

Route::resource('articles', 'App\Http\Controllers\ArticlesController');

Route::get('/articles/tags/{tag}', 'App\Http\Controllers\TagsController@index');

// Contacts interface
Route::get('/contacts', 'App\Http\Controllers\ContactsController@create');
Route::get('/admin/feedback', 'App\Http\Controllers\ContactsController@index');
Route::post('/contacts', 'App\Http\Controllers\ContactsController@store');
