<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
            'password', 'remember_token',
    ];

    /**
     * Get the wishlistItems for the user.
     */
    public function wishlistItems()
    {
            return $this->hasMany('App\WishlistItem');
    }

    /**
     * Check if user owns wishlist item
     */
    public function ownsItemId($id)
    {
        // Pull items and collapse to just get ids
        $items = $this->wishlistItems->toArray();
        $ids = array_column($items, 'id');
        return in_array($id, $ids);
    }

    /**
     * User roles
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Check for role
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
