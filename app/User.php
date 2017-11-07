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
