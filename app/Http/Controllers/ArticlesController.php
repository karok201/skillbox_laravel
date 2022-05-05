<?php

namespace App\Http\Controllers;

use App\Helpers\FormRequest;
use App\Models\Article;
use Illuminate\Validation\ValidationException;

class ArticlesController extends Controller
{
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

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article)
    {
        $attributes = FormRequest::validate(request());

        $article->update($attributes);

        return redirect('/articles/' . $attributes['slug']);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/articles');
    }

    /**
     * @throws ValidationException
     */
    public function store()
    {
        $attributes = FormRequest::validate(request());

        Article::create($attributes);

        return redirect('/articles');
    }
}
