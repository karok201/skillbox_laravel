@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Создание статьи
        </h3>

        @include('layout.errors')

        <form method="post" action="/">
            @csrf
            <div class="mb-3">
                <label for="inputSlug" class="form-label">Символьный код</label>
                <input type="text" class="form-control" id="inputSlug" placeholder="Введите символьный код" name="slug">
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Название статьи</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите название статьи" name="title">
            </div>
            <div class="mb-3">
                <label for="inputBody" class="form-label">Детальное описание статьи</label>
                <input type="text" class="form-control" id="inputBody" placeholder="Введите описание" name="shortBody">
            </div>
            <div class="mb-3">
                <label for="inputBody" class="form-label">Краткое описание статьи</label>
                <input type="text" class="form-control" id="inputBody" placeholder="Введите описание" name="largeBody">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="inputPublished" value="1" name="published">
                <label class="form-check-label" for="inputPublished">Published</label>
            </div>
            <button type="submit" class="btn btn-primary">Создать статью</button>
        </form>

    </div>
@endsection
