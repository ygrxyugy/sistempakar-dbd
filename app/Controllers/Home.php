<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Sistem Pakar DBD'
        ];

        echo view('templates/header', $data);
        echo view('templates/topbar');
        echo view('index');
        echo view('templates/footer');
    }
}
