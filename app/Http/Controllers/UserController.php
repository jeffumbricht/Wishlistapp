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
    // isn't this user and is a user
    if ($id != Auth::id() && User::find($id)) {
      $wishlistItems = User::find($id)->wishlistItems->toArray();
      return view('home', compact('wishlistItems'));
    }
    else {
      // no peaking on your own
      return redirect('home');
    }
  }
}
