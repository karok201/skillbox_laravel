@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic">
            Тэги
        </h3>

        @forelse($news as $item)
            @include('news.item')
        @empty
            <p>У вас нет своих новостей</p>
        @endforelse

        {{$news->links()}}
    </div>
@endsection
