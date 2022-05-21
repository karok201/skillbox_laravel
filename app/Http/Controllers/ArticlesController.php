<?php

namespace App\Http\Controllers;

use App\Helpers\FormRequest;
use App\Models\Article;
use App\Notifications\ArticleCreated;
use App\Notifications\ArticleUpdated;
use App\Notifications\ArticleDeleted;
use App\Services\TagsSynchronizer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $articles = Article::latest()->get()->filter->published;

        return view('index', compact('articles'));
    }

    public function show(Article $article)
    {
        Gate::authorize('view', $article);

        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        $article->update(FormRequest::validate());

        $tagsSynchronizer->sync($article);

        $article->owner->notify(new ArticleUpdated());

        return redirect('/articles');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        $article->owner->notify(new ArticleDeleted());

        return redirect('/articles');
    }

    /**
     * @throws ValidationException
     */
    public function store(TagsSynchronizer $tagsSynchronizer)
    {
        $article = Article::create(FormRequest::validate());

        $tagsSynchronizer->sync($article);

        $article->owner->notify(new ArticleCreated());

        return redirect('/articles');
    }
}
