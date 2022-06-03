<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag
            ->articles()
            ->where('published', Article::PUPLISHED_YES)
            ->with('tags')
            ->simplePaginate(5);

        return view('index', compact('articles'));
    }
}
