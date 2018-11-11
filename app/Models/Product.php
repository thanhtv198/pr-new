<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use Rateable, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'promotion',
        'date_manufacture',
        'user_id',
        'category_id',
        'manufacture_id',
        'color',
        'os',
        'screen',
        'front_camera',
        'back_camera',
        'ram',
        'cpu',
        'sim',
        'memory',
        'pin',
        'battery',
        'status',
        'is_new',
        'views',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customizeProducts()
    {
        return $this->hasMany(CustomizeProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function scopeSearch($query, $request)
    {
        return $query->where('name', 'like', '%' . $request . '%')
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProduct'));
    }

    public function scopeSearchByUser($query, $user_id)
    {
        return $query->whereIn('user_id', $user_id)
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProduct'));
    }

    public function scopeSearchNameDes($query, $key)
    {
        return $query->where('name', 'like', '%' . $key . '%')
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->orWhere('description', 'like', '%' . $key . '%')
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProduct'));
    }

    public function scopeSearchName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%')
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->paginate(config('app.paginateProductSearch'));
    }

    public function scopeDiscount($query)
    {
        return $query->where('promotion', '<>', 0)
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProduct'));
    }

    public function scopeViews($query)
    {
        return $query->where('deleted_at', config('page.product.deleted_at.null'))
            ->orderBy('created_at', 'DESC')
            ->where('status', config('page.product.status.inactive'))
            ->take(config('app.paginateProduct'))->get();
    }

    public function scopeGetProduct($query)
    {
        return $query->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->orderBy('created_at', 'DESC')
            ->paginate(config('app.paginateProductSearch'));
    }

    public function scopeProductCheck($query)
    {
        return $query->where('status', config('page.product.status.active'))
            ->orderBy('created_at', 'DESC');
    }

    public function scopeGetById($query, $id)
    {
        return $query->findOrFail($id);
    }

    public function scopeAccept($query, $id)
    {
        return $query->where('id', $id)
            ->update([
                'status' => config('page.product.status.inactive'),
                'check' => ''
            ]);
    }

    public function scopeReject($query, $id, $content)
    {
        return $query->where('id', $id)
            ->update([
                'status' => config('page.product.status.reject'),
                'check' => $content
            ]);
    }

    public function scopeUpdateViews($query, $id, $views)
    {
        return $query->where('id', $id)
            ->update(['views' => $views + 1]);
    }

    public function scopeGetAll($query)
    {
        return $query->where('deleted_at', config('page.product.deleted_at.null'))
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopeGetCategory($query, $id)
    {
        return $query->where('category_id', $id)
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProductSearch'));
    }

    public function scopeGetManufacture($query, $id)
    {
        return $query->where('manufacture_id', $id)
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProductSearch'));
    }

    public function scopePriceBetween($query, $from, $to)
    {
        return $query->whereBetween('price', [$from, $to])
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProductSearch'));
    }

    public function scopePriceFrom($query, $from)
    {
        return $query->where('price', '>=', $from)
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProductSearch'));
    }

    public function scopePriceTo($query, $to)
    {
        return $query->where('price', '<=', $to)
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProductSearch'));
    }

    public function scopeGetByAddress($query, $array)
    {
        return $query->whereIn('user_id', $array)->orderBy('id', 'DESC')
            ->where('deleted_at', config('page.product.deleted_at.null'))
            ->where('status', config('page.product.status.inactive'))
            ->paginate(config('app.paginateProductSearch'));
    }

    public function scopeSearchMultiple($query, $category_id, $price)
    {
        switch ($price) {
            case 1:
                $query = $query->whereRaw('(price - promotion) < 5000000');
                break;
            case 2:
                $query = $query->whereRaw('(price - promotion) >= 5000000 and (price - promotion) <= 10000000');
                break;
            case 3:
                $query = $query->whereRaw('(price - promotion) >= 10000000 and (price - promotion) <= 15000000');
                break;
            case 4:
                $query = $query->whereRaw('(price - promotion) >= 15000000 and (price - promotion) <= 20000000');
                break;
            case 5:
                $query = $query->whereRaw('(price - promotion) > 20000000');
                break;
            default:
                break;
        }

        if (!$category_id) {
            return $query->orderByRaw('price - promotion ', 'asc');
        }

        return $query->where('category_id', $category_id)->orderByRaw('price - promotion ', 'asc');
    }
}

