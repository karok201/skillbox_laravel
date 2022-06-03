<article class="blog-post">
    <h2 class="blog-post-title"><a href="/news/{{ $item->getRouteKey() }}">{{ $item->title }}</a></h2>
    <p class="blog-post-meta">{{ $item->created_at->toFormattedDateString() }}</p>

    {{ $item->body }}
</article>
<hr>
