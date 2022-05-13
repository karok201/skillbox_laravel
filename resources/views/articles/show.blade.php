@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->title }} <a href="/articles/{{ $article->slug }}/edit">Изменить</a>
        </h3>
        @foreach($article->tags as $tag)
            <a href="" class="btn btn-sm btn-success">{{ $tag->name }}</a>
        @endforeach
        <br>
        {{ $article->created_at->toFormattedDateString() }}
        <hr>

        {{ $article->largeBody }}

        <hr>
        {{ $article->shortBody }}
        <hr>
        <a href="/articles">Вернуться к списку</a>
    </div>
@endsection
