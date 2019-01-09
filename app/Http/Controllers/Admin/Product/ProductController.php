<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Block;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController;
use Validator;
use Carbon\Carbon;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProduct()
    {
        $products = Product::getAll();

        return view('admin.product.product.index', compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('admin/product/index')->with('success', trans('common.with.delete_success'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchProduct(Request $request)
    {
        $products = Product::searchName($request->key);

        return view('admin.product.product.index', compact('products'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept($id)
    {

        Product::where('id', $id)->update([
            'status' => config('model.product.status.active'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Block::where('blockable_id', $id)->where('blockable_type', 'App\\Models\\Product')->delete();
        return redirect()->back();
    }

    /**
     * @param Request $request
     */
    public function reject(Request $request)
    {
        $id = $request->id;

        $product = Product::findOrFail($id);
        $product->update([
            'status' => config('model.product.status.reject'),
        ]);

        $product->block()->create([
            'reason' => $request->reason,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteManyProduct(Request $request)
    {
        for ($i = 0; $i < count($request->check); $i++) {
            $product = Product::findOrFail($request->check[$i]);
            $product->delete();
        }

        return redirect('admin/product/index')->with('success', trans('common.with.delete_success'));
    }
}

