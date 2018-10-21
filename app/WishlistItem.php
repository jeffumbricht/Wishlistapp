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
    protected $fillable = ['title', 'description', 'link', 'user_id', 'buyer_id', 'suggested_by_id'];

    /**
     * Wishlist Item has a buyer
     */
    public function buyer()
    {
        return $this->hasOne('App\User', 'id', 'buyer_id');
        // return $this->buyer_id;
    }

    public function buyerName()
    {
        return $this->buyer->name;
    }

    public function suggester()
    {
        return $this->hasOne('App\User', 'id', 'suggested_by_id');
    }

    public function suggestedBy()
    {
        return $this->suggester->name;
    }

}
