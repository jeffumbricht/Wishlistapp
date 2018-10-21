<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends AuthController
{

    /**
    * Show a another user's wishlist.
    *
    * @return \Illuminate\Http\Response
    */
    public function index($id)
    {
        $user = User::find($id);
        // isn't this user and is a user
        if ($id != Auth::id() && $user) {

            $wishlistItems = $user->wishlistItems
                ->where('suggested_by_id', null);

            $suggestedItems = $user->wishlistItems
                ->where('suggested_by_id', '<>', null);

            return view('user.wishlist')
                ->with('wishlistItems', $wishlistItems)
                ->with('suggestedItems', $suggestedItems)
                ->with('name', $user->name)
                ->with('belongsToId', $user->id);
        }
        else {
            // no peaking on your own
            return redirect('home');
        }
    }
}
