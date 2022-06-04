<?php

namespace App\Http\Controllers;

use App\Helpers\FormRequest;
use App\Models\Article;
use App\Notifications\Articles\ArticleCreated;
use App\Notifications\Articles\ArticleDeleted;
use App\Notifications\Articles\ArticleUpdated;
use App\Services\Pushall;
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
        $articles = Article::query()
            ->where('published', Article::PUPLISHED_YES)
            ->latest()
            ->simplePaginate(10)
        ;

        return view('index', compact('articles'));
    }

    public function show(Article $article)
    {
        Gate::allows('view', $article);

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
        $article->update(FormRequest::articleVaildate());

        $tagsSynchronizer->sync($article);

        $article->user->notify(new ArticleUpdated());

        return redirect('/articles');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        $article->user->notify(new ArticleDeleted());

        return redirect('/articles');
    }

    /**
     * @throws ValidationException
     */
    public function store(TagsSynchronizer $tagsSynchronizer, Pushall $pushall)
    {
        $article = Article::create(FormRequest::articleValidate());

        $tagsSynchronizer->sync($article);

        $article->user->notify(new ArticleCreated());

        $pushall->send('Статья успешно создана', $article->shortBody);

        return redirect('/articles');
    }
}
