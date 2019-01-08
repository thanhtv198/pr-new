<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'blocks';

    protected $fillable = [
        'id',
        'blockable_id',
        'blockable_type',
        'reason',
    ];

    public function blockable()
    {
        return $this->morphTo();
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
