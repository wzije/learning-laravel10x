<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //tambahan untuk bootstrap pangination
        Paginator::useBootstrapFive();

        //untuk kebutuhan ROLE
        Gate::define("admin", function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define("editor", function (User $user) {
            return $user->role === 'editor';
        });

        Gate::define("author", function (User $user) {
            return $user->role === 'author';
        });


        //Gate untuk kebutuhan Permission
        Gate::define("post.update", function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define("post.delete", function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define("post.create", function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
    }
}
