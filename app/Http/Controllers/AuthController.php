<?php

namespace App\Http\Controllers;
use App\User;
use View;

class AuthController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');

    $users = User::all();
    // TODO replace with https://laravel.com/docs/5.1/views#view-composers
    // can't filter out current user because Auth is middleware
    View::share('users', $users);
  }

}
