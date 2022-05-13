@if($article->tags->isNotEmpty())
    @foreach($article->tags as $tag)
        <a href="/tags/{{ $tag->getRouteKey() }}" class="btn btn-sm btn-success">{{ $tag->name }}</a>
    @endforeach
@endif
