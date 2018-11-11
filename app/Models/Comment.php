<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'id',
        'user_id',
        'commentable_type',
        'commentable_id',
        'content',
        'parent_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'commentable_id');
    }

    public function scopeGetByIdProduct($query, $id)
    {
        return $query->where('commentable_id', $id)->where('commentable_type', 'product')->get();
    }

    public function scopeGetByIdPost($query, $id)
    {
        return $query->where('commentable_id', $id)->where('commentable_type', 'post')->get();
    }
}
