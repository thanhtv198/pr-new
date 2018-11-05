<?php

namespace App\Http\Controllers\Site;

use App\Contracts\Repositories\WishlistRepository;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Dumper\PoFileDumper;

class WishlistController extends Controller
{
    public function index()
    {
        $ids = Wishlist::where('user_id',  auth()->user()->id)->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $ids)->get();

        return view('site.wishlist.index', compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|int
     */
    public function addToWishlist($id)
    {
        $ids = Wishlist::where('user_id',  auth()->user()->id)->pluck('product_id')->toArray();

        if(in_array($id, $ids )) {
            return $response = [
                    'message' => trans('common.with.wishlist_already_exits'),
                    'product' => count($ids),
                ];
        } else {
            Wishlist::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ]);

            return $response = [
                'success' => trans('common.with.add_wishlist_success'),
            ];
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = Wishlist::where('product_id', $id)->first();
        $product->delete();

        return $response = [
            'success' => trans('common.with.delete_wishlist_success'),
            'empty' => trans('common.with.wishlist_empty'),
        ];
    }
}
