@if($article->tags->isNotEmpty())
    @foreach($article->tags as $tag)
        <a href="/articles/tags/{{ $tag->getRouteKey() }}" class="btn btn-sm btn-success">{{ $tag->name }}</a>
    @endforeach
@endif
