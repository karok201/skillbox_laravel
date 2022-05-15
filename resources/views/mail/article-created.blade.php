@component('mail::message')
# New article created: {{ $article->title }}

{{ $article->shortBody }}

The body of your message.

@component('mail::button', ['url' => '/articles/' . $article->slug])
To article
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
