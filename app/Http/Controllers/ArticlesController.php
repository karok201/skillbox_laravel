<?php

namespace App\Http\Controllers;

use App\Helpers\FormRequest;
use App\Models\Article;
use App\Services\TagsSynchronizer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $articles = Article::latest()->get();

        return view('index', compact('articles'));
    }

    public function show(Article $article)
    {
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
        $attributes = FormRequest::validate(request());

        $article->update($attributes);

        $article->owner->notify(new \App\Notifications\ArticleUpdated());

        if (empty(request('tags'))) {
            $article->tags()->delete();

            return redirect('/articles/' . $attributes['slug']);
        }

        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });

        $tagsSynchronizer->sync($tags, $article);

        return redirect('/articles/' . $attributes['slug']);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        $article->owner->notify(new \App\Notifications\ArticleDeleted());

        return redirect('/articles');
    }

    /**
     * @throws ValidationException
     */
    public function store(TagsSynchronizer $tagsSynchronizer)
    {
        $attributes = FormRequest::validate(request());

        $attributes['owner_id'] = auth()->id();

        $article = Article::create($attributes);

        $article->owner->notify(new \App\Notifications\ArticleCreated());

        if (empty(request('tags'))) {
            $article->tags()->delete();

            return redirect('/articles/' . $attributes['slug']);
        }

        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) { return $item; });

        $tagsSynchronizer->sync($tags, $article);

        return redirect('/articles');
    }
}
