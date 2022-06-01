@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Отправить уведомление
        </h3>

        @include('layout.errors')

        <form method="post" action="/service">

            @csrf

            <div>
                <label for="formTitle">Заголовок</label>
                <input class="form-control" id="formTitle" type="text" name="title">
            </div>
            <div>
                <label for="formText">Текст</label>
                <input class="form-control" id="formText" type="text" name="text">
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
