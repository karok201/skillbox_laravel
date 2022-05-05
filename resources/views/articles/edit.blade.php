@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Изменение статьи
        </h3>

        @include('layout.errors')

        <form method="post" action="/articles/{{ $article->slug }}">

            @method('PATCH')
            @csrf

            @include('articles.form')

            <button type="submit" class="btn btn-primary">Изменить статью</button>
        </form>
        <form method="post" action="/articles/{{ $article->slug }}">

            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Удалить статью</button>
        </form>
    </div>
@endsection
