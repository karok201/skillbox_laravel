<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\NewsComment;
use App\Notifications\CommentCreated;
use Illuminate\Http\RedirectResponse;

class NewsCommentController extends Controller
{
    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'description' => ['required', 'min:5', 'max:100'],
            'news_id' => ['required', 'numeric'],
        ]);

        $attributes['user_id'] = auth()->id();

        $comment = NewsComment::create($attributes);

        $comment->user->notify(new CommentCreated());

        return back();
    }
}
