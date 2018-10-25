<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'user' => [
            \App\Contracts\Repositories\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class,
        ],
        'post' => [
            \App\Contracts\Repositories\PostRepository::class,
            \App\Repositories\PostRepositoryEloquent::class,
        ],
        'topic' => [
            \App\Contracts\Repositories\TopicRepository::class,
            \App\Repositories\TopicRepositoryEloquent::class,
        ],
        'tag' => [
            \App\Contracts\Repositories\TagRepository::class,
            \App\Repositories\TagRepositoryEloquent::class,
        ],
        'social' => [
            \App\Contracts\Services\SocialInterface::class,
            \App\Services\SocialService::class,
        ],
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}