<article class="blog-post">
    <h2 class="blog-post-title">{{ $contact->email }}</h2>
    <p class="blog-post-meta">{{ $contact->created_at->toFormattedDateString() }}</p>

    {{ $contact->message }}
</article>
<hr>
