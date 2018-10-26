<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'id',
        'buyer_id',
        'name',
        'email',
        'phone_number',
        'local_id',
        'address',
        'total',
        'note',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];

    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function scopeGetBuyer($query, $id)
    {
        return $query->where('buyer_id', $id)
            ->orderBy('id', 'DESC')
            ->where('deleted_at', null)
            ->get();
    }

    public function scopeGetDetail($query, $id)
    {
        return $query->where('id', $id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopeDeleteOrder($query, $id)
    {
//        return $query->where('id', $id)
//            ->update(['deleted_at'=> null]);
    }
}

