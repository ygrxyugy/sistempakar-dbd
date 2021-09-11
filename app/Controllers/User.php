<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data=[
            'title'=>'User Dashboard'
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/index');
        
        echo view('templates/footer');
    }


    public function profile()
    {
        $data=[
            'title'=>'Profile'
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/profile');
        
        echo view('templates/footer');
    }

    public function survey()
    {
        $data=[
            'title'=>'Cek Kesehatan'
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/survey');
        
        echo view('templates/footer');
    }
    public function history()
    {
        $data=[
            'title'=>'Riwayat Pemeriksaan'
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/history');
        
        echo view('templates/footer');
    }
}
