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

        @forelse($article->history as $item)
            <p>{{$item->email}} - {{$item->pivot->created_at->diffForHumans()}} - {{$item->pivot->before}} - {{$item->pivot->after}}</p>
        @empty
            <p>Изменений не было</p>
        @endforelse
        <a href="/articles">Вернуться к списку</a>

        @auth()
            @include('layout.errors')

            @include('comments.form')
        @endauth

        @foreach($article->comments as $comment)
            <div class="row">
                <h4 class="">{{$comment->user->email}}</h4>
                <p>{{$comment->created_at->diffForHumans()}}</p>
                <p>{{$comment->description}}</p>
            </div><hr>
        @endforeach
    </div>
@endsection
