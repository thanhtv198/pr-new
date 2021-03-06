<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use willvincent\Rateable\Rateable;

class User extends Authenticatable
{
    use Rateable;
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role_id',
        'city_id',
        'email',
        'birthday',
        'provider_id',
        'address',
        'phone_number',
        'password',
        'status',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->HasOne(Role::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function responds()
    {
        return $this->hasMany(Respond::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function scopeCompare($query, $id)
    {
        if (Auth::user()->id == $id) {
            return true;
        }

        return false;
    }

    public function scopeSearch($query, $key)
    {
        return $query->where('name', 'like', '%' . $key . '%')->get()->toArray();
    }

    public function scopeRemove($query, $id)
    {
        return $query->where('id', $id)->update(['remove' => 1]);
    }

    public function scopeManager($query, $request)
    {
        return $query->where('name', 'like', '%' . $request . '%')
            ->where('role_id', '<>', config('page.user.role.member'));
    }

    public function scopeMember($query, $request)
    {
        return $query->where('name', 'like', '%' . $request . '%')
            ->where('level_id', config('page.user.role.member'));
    }
}

