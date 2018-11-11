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

    public function scopeGetAllCategories()
    {
        $categorys = Category::all();
        $list = array();
        foreach ($categorys as $key => $value) {
            if ($value->parent_id == null && count($value->subCategory) > 0){
                foreach ($categorys as $key1 => $value1) {
                    if ($value1->parent_id == $value->id) {
                        $list[$value->name][$value1->id] = $value1->name;
                    }
                }
            }else if ($value->parent_id == null) {
                $list[$value->id] = $value->name;
            }
        }

        return $list;

    }

    public function scopeSearch($query, $key)
    {
       return $query->where('name', 'like', '%' . $key . '%');
    }

    public function subCategories()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function childs()
    {
        return $this->belongsTo(self::class, 'id', 'parent_id');
    }

    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
