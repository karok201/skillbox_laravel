@component('mail::message')
    <h1>All articles for {{$period}} days</h1>
    @foreach($articles as $article)
        @component('mail::button', ['url' => '/articles/'.$article->getRouteKey()])
            {{$article->title}}
        @endcomponent
    @endforeach
@endcomponent
