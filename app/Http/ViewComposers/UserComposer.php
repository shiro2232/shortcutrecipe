<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UserComposer
{

    public function  __construct()
    {
    }

    public function compose(View $view)
    {
        $auth_user = Auth::user();
        $view->with('auth_user', $auth_user);
    }
}
