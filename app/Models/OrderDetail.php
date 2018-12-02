<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'order_id',
        'product_id',
        'quantity',
        'price',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeGetSold($query)
    {
        return $query->where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopehandleSold($query, $id)
    {
        return $query->where('id', $id)
            ->update(['status' => config('page.order_detail.remove.inactive')]);
    }

    public function scopeOrderBought($query, $id)
    {
        return $query->where('order_id', $id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopeCancel($query, $id)
    {
        return $query->where('id', $id)
            ->update(['status' => config('page.order_detail.status.cancel')]);
    }

    public function scopeDeleteOrderDetail($query, $id)
    {

    }
}

