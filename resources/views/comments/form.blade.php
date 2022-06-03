<form method="post" action="/comments">

    @csrf

    <div>
        <label>
            <textarea class="form-control" name="description"></textarea>
        </label>
    </div>

    <input type="hidden" name="article_id" value="{{$article->id}}">

    <div>
        <input class="btn btn-sm btn-outline-dark" type="submit" value="Добавить коментарий">
    </div>
</form>
