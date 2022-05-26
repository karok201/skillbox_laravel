<?php

namespace App\Providers;

use App\Models\Tag;
use App\Services\TagsSynchronizer;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TagsSynchronizer::class, function () {
            return new TagsSynchronizer();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.sidebar', function ($view) {
            $view->with('tagsCloud', Tag::tagsCloud());
        });

        Blade::if('admin', function ():bool {
            return auth()->user()->isAdmin();
        });
    }
}
