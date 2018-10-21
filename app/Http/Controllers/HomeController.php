<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends AuthController
{

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $wishlistItems = Auth::user()
        ->wishlistItems
        ->where('suggested_by_id', null)
        ->toArray();

        return view('home', compact('wishlistItems'));
    }
}
