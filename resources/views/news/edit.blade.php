@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Изменение новости
        </h3>

        @include('layout.errors')

        <form method="post" action="/news/{{$item->slug}}">

            @method('PATCH')
            @csrf

            @include('news.form')

            <button type="submit" class="btn btn-primary">Изменить новость</button>
        </form>
        <form method="post" action="/news/{{ $item->slug }}">

            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Удалить новость</button>
        </form>
    </div>
@endsection
