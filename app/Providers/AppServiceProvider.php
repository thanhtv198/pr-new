<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use DB;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer(['site.layouts.sidebar', 'site.layouts.banner', 'site.layouts.header'], function ($view)
        {
            $categoriesHeader = Category::with('subCategory')->get();
            $newsSidebar = DB::table('news')->orderBy('id', 'DESC')->take(config('app.paginateNews'))->get();
            $slideSidebar = DB::table('slides')->orderBy('id', 'DESC')->take(config('app.paginateNews'))->get();
            $address = DB::table('cities')->pluck('name', 'id');

            $view->with(compact([
                'categoriesHeader',
                'newsSidebar',
                'slideSidebar',
                'address',
            ]));
        });
        view()->composer( 'site.layouts.header', function ($view1) {
            if (Auth::check()) {
                $wishlistHeader = Wishlist::where('user_id', auth()->user()->id)->count();
                $view1->with(compact([
                    'wishlistHeader',
                ]));
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Contracts\Services\SocialInterface::class,
            \App\Services\SocialService::class
        );
    }
}

