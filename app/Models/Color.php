<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    
    protected $fillable = [
        'id',
        'name',
        'avatar',
        'created_at',
        'updated_at'
    ];
}
