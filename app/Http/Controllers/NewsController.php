<?php

namespace App\Http\Controllers;

use App\Helpers\FormRequest;
use App\Models\News;
use App\Notifications\News\NewsCreated;
use App\Notifications\News\NewsDeleted;
use App\Notifications\News\NewsUpdated;
use App\Services\Pushall;
use Gate;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->when(request('user_id') && auth()->user() && request('user_id') == auth()->id(),
                fn($builder) => $builder,
                fn($builder) => $builder->where('published', true)
            )
            ->when(request('user_id'), fn($builder) => $builder->whereUserId(request('user_ids')))
            ->latest()
            ->paginate(10)
            ->appends(request()->only('user_id'))
        ;

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', ['item' => $news]);
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);

        return view('news.edit', ['item' => $news]);
    }

    public function update(News $news)
    {
        $this->authorize('update', $news);

        $news->update(FormRequest::newsValidate());

        $news->user->notify(new NewsUpdated());

        return redirect('/news');
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Pushall $pushall)
    {
        $item = News::create(FormRequest::newsValidate());

        $item->user->notify(new NewsCreated());

        $pushall->send('Статья успешно создана', $item->body);

        return redirect('/news');
    }

    public function destroy(News $news)
    {
        $news->delete();

        $news->user->notify(new NewsDeleted());

        return redirect('/news');
    }
}
