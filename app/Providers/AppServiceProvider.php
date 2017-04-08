<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer('layouts.sidebar', function($view) {

        $archives = \App\Post::archives();
        $tags = \App\Tag::has('posts')->pluck('name');

        $view->with(compact('archives', 'tags'));

      });


      view()->composer('posts.post', function($view) {

        $tags = \App\Tag::has('posts')->pluck('name');

        $view->with(compact('tags'));

      });


      view()->composer('posts.show', function($view) {

        $users = \App\User::has('comments')->pluck('name');

        $view->with(compact('users'));

      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
