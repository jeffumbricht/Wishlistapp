<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
    * Show a another user's wishlist.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return User::all();
    }
}
