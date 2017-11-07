<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends AuthController
{

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $wishlistItems = User::find(Auth::id())->wishlistItems->toArray();

    return view('home', compact('wishlistItems'));
  }
}
