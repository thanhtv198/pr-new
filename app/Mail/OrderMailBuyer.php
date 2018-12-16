<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class OrderMailBuyer extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $content)
    {
        $this->order = $order;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.order_buyer')->with([
            'order' => $this->order,
            'content' => $this->content,
        ]);
    }
}
