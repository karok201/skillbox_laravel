@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic">
            Тэги
        </h3>

        @foreach($articles as $article)
            @include('articles.item')
        @endforeach

        {{$articles->links()}}
    </div>
@endsection
