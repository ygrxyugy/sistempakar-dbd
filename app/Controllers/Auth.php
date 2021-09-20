<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index(){
        $data=[
            'title'=>'HeartBreak'
        ];
        echo view('templates/header', $data);
        echo view('index');
        echo view('templates/footer');
    }
    public function login()
    {
        return view('Auth/login');
    }

    public function register()
    {
        return view('Auth/register');
    }
}
