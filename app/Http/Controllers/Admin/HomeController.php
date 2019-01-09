<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\Product;
use App\Models\Respond;
use App\Models\Slide;
use App\Models\User;
use Charts;
use DB;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $product = count(Product::getAll());

        $news = count(News::all());

        $member = count(User::all());

        $respond = count(Respond::all());

        $slide = count(Slide::all());

        $products = Product::productCheck()->get();

        $data = array(
            'total_user' => User::where('role_id', 3)->count(),
            'total_product' => Product::all()->count(),
            'total_category' => Category::all()->count(),
            'total_respond' => Respond::all()->count(),
            'total_post' => Post::all()->count(),
            'total_order' => OrderDetail::all()->count(),
            'total_new' => News::all()->count(),
            'total_slide' => Slide::all()->count(),
        );

        $chartOrder = Charts::database(OrderDetail::all(), 'pie', 'google')
            ->title(trans('common.dashboard.chart_order'))
            ->dimensions(900, 500)
            ->responsive(false)
            ->groupBy('status', null,
                array( trans('common.chart.pendding'),
                    trans('common.chart.success'),
                    trans('common.chart.cancel')));


        $chartUser = Charts::database(User::where('role_id', 3)->get(), 'bar', 'google')
            ->title(trans('common.dashboard.chart_user'))
            ->dimensions(900, 500)
            ->responsive(false)
            ->groupByMonth(2018, true);

        $chartProduct = Charts::database(Product::all(), 'line', 'google')
            ->title(trans('common.dashboard.chart_product'))
            ->dimensions(900, 500)
            ->responsive(false)
            ->groupByMonth(2018, true);

//
        return view('admin.home', compact( 'data',  'chartUser', 'chartOrder','chartProduct', 'products'));
    }
}

