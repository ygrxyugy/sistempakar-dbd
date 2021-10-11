<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Heartnalyze'
        ];

        echo view('templates/header', $data);
        echo view('index');
        echo view('templates/footer');
    }
}
