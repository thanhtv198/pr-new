<?php

namespace App\Http\Controllers\Site;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacture;
use App\Models\Comment;
use Auth;
use DB;
use App\Http\Requests\CommentRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class ProductController extends Controller
{
    use Rateable;

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDetailProduct($id)
    {
        $product = Product::findOrFail($id);
        if ($product->status == 1) {
            $images = $product->images;

            $categories = Category::all();

            $manufactures = Manufacture::all();

            $comments = Comment::getByIdProduct($product->id);

            $views = $product->views;

            Product::updateViews($id, $views);

            return view('site.product.detail',
                compact('product', 'categories', 'manufactures', 'images', 'comments', 'replies')
            );
        }

        return view('site.404');
    }

    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function comment(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->merge([
            'user_id' => Auth::user()->id,
        ]);

        $comment = $product->comments()->create($request->all());

        return [
            'comment' => $comment,
            'name' => auth()->user()->name,
            'time' => $comment->created_at->diffForHumans(),
            'avatar' => Auth::user()->avatar?Auth::user()->avatar: '',
            'base_url' => url(config('model.user.upload')),
            'reply' => trans('common.button.reply'),
        ];
    }

    /**
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reply(Request $request, $id)
    {
        $product = Product::findOrFail($request->productId);
        $request->merge([
            'user_id' => auth()->user()->id,
            'parent_id' => $request->parent_id,
            'content' => $request->repContent,
        ]);

        $reply = $product->comments()->create($request->all());

        return [
            'replies' => $reply,
            'name' => auth()->user()->name,
            'time' => $reply->created_at->diffForHumans(),
            'avatar' => Auth::user()->avatar?Auth::user()->avatar: '',
            'base_url' => url(config('model.user.upload')),
            'reply' =>trans('common.button.reply'),
        ];
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rating(Request $request, $id)
    {
        if (!$request->rate) {
            return back()->with('message', 'You have to select your rating');
        }

        $pro = Product::findOrFail($id);

        $userId = auth()->user()->id;

        $collect = Rating::getUserRating($userId, $id)->first();

        if ($collect == null) {
            $rating = new \willvincent\Rateable\Rating;
            $rating->rating = $request->rate;
            $rating->user_id = $userId;

            $pro->ratings()->save($rating);
        }

        Rating::updateUserRating($userId, $id, $request->rate);

        return back();
    }
}

