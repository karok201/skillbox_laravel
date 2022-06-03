<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-10 text-align-center">
                <h1 class="display-4">
                    Skillbox Laravel
                </h1>
            </div>
{{--            <div class="col-10 text-center">--}}
{{--                <a class="blog-header-logo text-dark" href="#">Large</a>--}}
{{--            </div>--}}
            <div class="col-2 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>
                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a id="navbarDropdown" class="btn btn-sm btn-outline-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </header>

    <div class="nav">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="/articles">Главная</a>
            <a class="p-2 link-secondary" href="/news">Новости</a>
            <a class="p-2 link-secondary" href="/about">О нас</a>
            @auth
                <a class="p-2 link-secondary" href="/contacts">Контакты</a>
                <a class="p-2 link-secondary" href="/articles/create">Создать статью</a>
                <a class="p-2 link-secondary" href="/news/create">Создать новость</a>
                @admin
                    <a class="p-2 link-secondary" href="/admin/feedback">Админ.обращения</a>
                    <a class="p-2 link-secondary" href="/admin/articles">Админ.статьи</a>
                @endadmin
            @endauth
        </nav>
    </div>
</div>
