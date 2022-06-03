<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::oldest()->paginate(20);

        return view('index', compact('articles'));
    }
}
