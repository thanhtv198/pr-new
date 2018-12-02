<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\Slide;
use Charts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacture;
use App\Models\Respond;
use App\Models\News;
use App\Models\User;
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

        $money = array(
            'total_mn' => 2,
            'month_mn' => 4,
            'last_month_mn' => 5,
            'day_mn' => 6
        );
        $chartOrder = Charts::database(OrderDetail::all(), 'pie', 'google')
            ->title("Biểu đồ số đơn đặt hàng")
            ->dimensions(900, 500)
            ->responsive(false)
            ->groupBy('status', null, array('Đang chờ', 'Thành công', 'Hủy bỏ'));
      $chartUser = Charts::database(User::where('role_id', 3)->get(), 'line', 'google')
                ->title("Biểu đồ lượng người dùng")
                ->dimensions(900, 500)
                ->responsive(false)
          ->groupByMonth(date('Y'), true);

//        return view('admin.home.index', compact('data', 'money', 'chart', 'chart1'));
        return view('admin.home', compact( 'data',  'chartUser', 'chartOrder', 'products'));
    }
}

