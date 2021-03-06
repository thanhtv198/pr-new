<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Respond;
use App\Http\Requests\RespondRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class InteractionController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function getInteract($id)
    {
        $orderBoughts = $this->getOrderBought();
        $orderSolds = $this->getOrderSold();
        $orderSolds = $this->getOrderSold();
        $responds = $this->getRespond();

        return view('site.profile.interact', compact('orderBoughts', 'orderSolds', 'responds'));
    }

    public function getRespond()
    {
        $responds = Respond::where('user_id', Auth::user()->id)->get();

        return $responds;
    }

    public function getOrderBought()
    {
        $id = Auth::user()->id;

        $orders = Order::getBuyer($id);

        return $orders;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrderBoughtDetail($id)
    {
        $orderdetails = OrderDetail::orderBought($id);

        return view('site.interaction.order_bought_detail', compact('orderdetails'));

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function cancelOrder($id)
    {
        try {
            OrderDetail::cancel($id);

            return back()->with('sucess', trans('common.with.cancel_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteOrderBought($id)
    {
        try {
            Order::deleteOrder($id);

            return back()->with('sucess', trans('common.with.delete_success'));
        } catch (ModelNotFoundException $e) {
            return view('admin.404');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getOrderSold()
    {
        $orderdetails = OrderDetail::getSold();

        \App\Models\Notification::where('notifiable_id', '>', 0)->update(['read_at' => Carbon::now()]);

        return $orderdetails;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $orderdetails = Orderdetail::getSold();

        foreach ($orderdetails as $row) {
            $status = $row->status;

            if ($status == 0) {
                $status = 'Handle now';
            } elseif ($status == 1) {
                $status = 'Handled';
            } else {
                $status = 'Canceled';
            }

            $order[] = array(
                'Code' => $row->id,
                'Full Name' => $row->order->name,
                'Email' => $row->order->email,
                'Phone' => $row->order->phone_number,
                'Address' => $row->order->address . ', ' . $row->order->city->name,
                'Product' => $row->product->name ?? trans('common.interact.product_is_delete'),
                'Quantity' => $row->quantity,
                'Price/1' => number_format($row->price),
                'Total' => number_format($row->price * $row->quantity),
                'Order Date' => date('d-m-Y', strtotime($row->created_at)),
                'Status' => $status,
                'Note' => $row->order->note,
            );
        }

        return (collect($order));
    }

    /**
     * @return mixed
     */
    public function exportFile()
    {
        return Excel::download(new InteractionController(), 'orders.xlsx');
    }

    public function importFile()
    {
        if(Input::hasFile('file')){
            $path = Input::file('file')->getRealPath();
            $csv = file_get_contents($path);
            $data = array_map("str_getcsv", explode("\n", $csv));
            foreach ($data as $key => $value) {
                $arr[] = ['title' => $value->title, 'description' => $value->description];
            }
        }
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Code',
            'Full Name',
            'Email',
            'Phone',
            'Address',
            'Product',
            'Quantity',
            'Price/1',
            'Total',
            'Order Date',
            'Status',
            'Note',
        ];
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleOrderSold($id)
    {
        Orderdetail::handleSold($id);

        return back()->with('sucess', trans('common.with.handle_success'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteOrderSold($id)
    {
        Orderdetail::deleteOrderDetail($id);

        return back()->with('sucess', trans('common.with.delete_success'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function respond()
    {
        return view('site.interaction.respond');
    }

    /**
     * @param RespondRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRespond(RespondRequest $request)
    {
        $request->merge([
            'status' => config('page.respond.status.active'),
            'user_id' => Auth::user()->id,
        ]);

        Respond::create($request->all());

        return redirect()->route('home_page')->with('success', trans('common.with.send_success'));
    }
}

