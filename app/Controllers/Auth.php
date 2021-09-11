<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('Auth/login');
    }

    public function register()
    {
        return view('Auth/register');
    }
}
