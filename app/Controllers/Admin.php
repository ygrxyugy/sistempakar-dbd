<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data=[
            'title'=>'Admin Dashboard'
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/index');
        echo view('templates/footer');
    }


    public function dataUser()
    {
        $data=[
            'title'=>'Data Pengguna'
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');

        echo view('admin/data-user');
        
        echo view('templates/footer');
    }

    public function dataGejala()
    {
        $data=[
            'title'=>'Data Gejala'
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/data-gejala');     
        echo view('templates/footer');
    }
    public function dataPenyakit()
    {
        $data=[
            'title'=>'Data Penyakit'
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/data-penyakit');    
        echo view('templates/footer');
    }
}
