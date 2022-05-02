@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Создание статьи
        </h3>

        @include('layout.errors')

        <form method="post" action="/contacts">
            @csrf
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Введите email" name="email">
            </div>
            <div class="mb-3">
                <label for="inputMessage" class="form-label">Сообщение</label>
                <input type="text" class="form-control" id="inputMessage" placeholder="Введите сообщение" name="message">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>

    </div>
@endsection
