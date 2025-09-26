<?php

namespace Modules\Auth\Controllers;

use App\Controllers\BaseController;

class Auth_Controllers extends BaseController
{
    public function login()
    {
        return view('Modules\Auth\Views\Login_Views');
    }

    public function register()
    {

        return view('Modules\Auth\Views\Register_Views');
    }
}