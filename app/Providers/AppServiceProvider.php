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
            $categoriesSidebar = Category::getAllCategories();
            $newsSidebar = DB::table('news')->orderBy('id', 'DESC')->take(config('app.paginateNews'))->get();
            $slideSidebar = DB::table('slides')->orderBy('id', 'DESC')->take(config('app.paginateNews'))->get();
            $city = DB::table('cities')->pluck('name', 'id');

            $priceSidebar = array(
                1 => 'Dưới 5 triệu',
                2 => 'Từ 5-10 triệu',
                3 => 'Từ 10-15 triệu',
                4 => 'Từ 15-20 triệu',
                5 => 'Trên 20 triệu'
            );

//            $ramSidebar = array(
//                1 => '2 GB',
//                2 => '3 GB',
//                3 => '4 GB',
//                4 => '6 GB',
//                5 => 'Trên 6 GB'
//            );

            $view->with(compact([
                'categoriesHeader',
                'newsSidebar',
                'slideSidebar',
                'city',
                'priceSidebar',
                'categoriesSidebar',
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

        view()->composer( 'site.layouts.header', function ($view2) {
            $lang = config('app.locale');
            $view2->with(compact([
                'lang',
            ]));
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

