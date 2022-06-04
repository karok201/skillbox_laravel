<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Admin\ArticlesController as AdminArticlesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NewsCommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\PushServiceController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

// Static pages...
Route::get('/about', function () {
    return view('staticPages.about');
});

// Resources Articles and News...
Route::resource('articles', ArticlesController::class);
Route::resource('news', NewsController::class);

// Page with articles attached to tags...
Route::get('/articles/tags/{tag}', [TagsController::class, 'index']);

// Contacts...
Route::get('/contacts', [ContactsController::class, 'create']);
Route::get('/admin/feedback', [ContactsController::class, 'index']);
Route::post('/contacts', [ContactsController::class, 'store']);

// Admin group...
Route::group(['middleware' => 'auth'], static function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.',
    ], static function () {
        Route::get('articles', [AdminArticlesController::class, 'index'])->name('articles.index');
        Route::get('news', [AdminNewsController::class, 'index'])->name('news.index');
    });
});

// Send Push...
Route::get('/service', [PushServiceController::class, 'form']);
Route::post('/service', [PushServiceController::class, 'send']);

// Leave comment...
Route::post('/articles/comments', [CommentController::class, 'store'])->middleware(['auth:sanctum']);
Route::post('/news/comments', [NewsCommentController::class, 'store'])->middleware(['auth:sanctum']);

// Authorization...
Auth::routes();
