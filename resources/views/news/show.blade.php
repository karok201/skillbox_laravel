@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                {{ $item->title }} <a href="/news/{{ $item->slug }}/edit">Изменить</a>
            </h3>
        <br>
        {{ $item->created_at->toFormattedDateString() }}
        <hr>

        {{ $item->body}}
        <br>

        <a href="/news">Вернуться к списку</a>

        @auth()
            @include('layout.errors')

            @include('comments.news_form')
        @endauth

        @foreach($item->comments as $comment)
            <div class="row">
                <h4 class="">{{$comment->user->email}}</h4>
                <p>{{$comment->created_at->diffForHumans()}}</p>
                <p>{{$comment->description}}</p>
            </div><hr>
        @endforeach
    </div>
@endsection
