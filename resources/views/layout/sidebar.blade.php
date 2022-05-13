<div class="col-md-4">
    <div class="position-sticky" style="top: 2rem; background-color: ghostwhite">
        <h1 class="display-4">Теги</h1>
        @foreach($tagsCloud as $tag)
            <a href="/articles/tags/{{ $tag->getRouteKey() }}" class="btn btn-sm btn-success">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
