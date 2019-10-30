<?php

namespace LaravelForum\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use LaravelForum\Channel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('channels', Channel::all());
    }
}
