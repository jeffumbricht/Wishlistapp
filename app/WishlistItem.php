<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'description', 'link', 'user_id', 'buyer_id'];

}
