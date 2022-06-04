<form method="post" action="/news/comments">

    @csrf

    <div>
        <label>
            <textarea class="form-control" name="description"></textarea>
        </label>
    </div>

    <input type="hidden" name="news_id" value="{{$item->id}}">

    <div>
        <input class="btn btn-sm btn-outline-dark" type="submit" value="Добавить коментарий">
    </div>
</form>
