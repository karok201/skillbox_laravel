<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('staticPages.about');
});

Route::resource('articles', 'App\Http\Controllers\ArticlesController');

// Contacts interface
Route::get('/contacts', 'App\Http\Controllers\ContactsController@create');
Route::get('/admin/feedback', 'App\Http\Controllers\ContactsController@index');
Route::post('/contacts', 'App\Http\Controllers\ContactsController@store');

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.',
    ], function () {
        Route::get('articles',
            'App\Http\Controllers\Admin\ArticlesController@index')
            ->name('articles.index');
    });
});

Auth::routes();
