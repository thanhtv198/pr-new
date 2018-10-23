<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeSearch($query, $key)
    {
       return $query->where('name', 'like', '%' . $key . '%');
    }

    public function subCategories()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function subCate()
    {
        return $this->hasMany(self::class, 'id', 'parent_id');
    }

    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
