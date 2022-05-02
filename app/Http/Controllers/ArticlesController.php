<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Validation\ValidationException;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('index', compact('articles'));
    }

    public function show(Article $slug)
    {
        return view('articles.show', ['article' => $slug]);
    }

    public function create()
    {
        return view('articles.create');
    }

    /**
     * @throws ValidationException
     */
    public function store()
    {
        $this->validate(request(), [
            'slug' => 'required|unique:App\Models\Article,title|regex:~^[a-z\d][a-z\d]*[_-]?[a-z\d]*[a-z\d ]$~i',
            'title' => 'required|min:5|max:100',
            'shortBody' => 'required|max:255',
            'largeBody' => 'required'
        ]);

        Article::create(request()->all());

        return redirect('/');
    }
}
