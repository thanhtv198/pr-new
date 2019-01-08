<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMailSeller extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $orderDeail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrderDetail $orderDetail, Order $order)
    {
        $this->orderDeail = $orderDetail;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.order_seller')->with([
            'order' => $this->order,
            'orderDetail' => $this->orderDeail,
        ]);
    }
}
