<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\User;

class NavComposer
{
    /**
     * The users
     *
     * @var User
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  User $user
     * @param  Auth $auth
     * @return void
     */
    public function __construct(User $user, Auth $auth)
    {
        // Dependencies automatically resolved by service container...
        $this->users = $user::all()
            //exclude current user
            ->whereNotIn('id', [Auth::id()]);
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('navUsers', $this->users);
    }
}
