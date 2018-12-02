<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
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
            $categoriesSidebar = Category::getAllCategories();
            $newsSidebar = DB::table('news')->orderBy('id', 'DESC')->take(config('app.paginateNews'))->get();
            $slideSidebar = DB::table('slides')->orderBy('id', 'DESC')->take(config('app.paginateNews'))->get();
            $city = DB::table('cities')->pluck('name', 'id');

            $priceSidebar = array(
                1 => trans('common.aside.5'),
                2 => trans('common.aside.5-10'),
                3 => trans('common.aside.10-15'),
                4 => trans('common.aside.15-20'),
                5 => trans('common.aside.20'),
            );

            $statusSidebar = array(
                1 => trans('common.aside.new'),
                2 => trans('common.aside.old'),
            );

            $view->with(compact([
                'categoriesHeader',
                'newsSidebar',
                'slideSidebar',
                'city',
                'priceSidebar',
                'categoriesSidebar',
                'statusSidebar',
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

        view()->composer( ['site.layouts.header', 'admin.layouts.header'], function ($view2) {
            $lang = config('app.locale');
            $view2->with(compact([
                'lang',
            ]));
        });

        view()->composer('site.forumn.*', function ($view3) {
            $recentPost = Post::getRecent()
                ->paginate(config('model.post.recent'));

            $topics = Topic::all();

            $tags = Tag::latest()
                ->take(config('model.tag.limit'))
                ->get();

            $view3->with(compact('recentPost', 'tags', 'topics'));
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

