<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $dataHistory = $this->historyModel();
        $dataGejala = $this->gejala();
        $data=[
            'title'=>'Admin Dashboard',
            'gejala' => $dataGejala,
            'history' => $dataHistory
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
        $dataGejala = $this->gejala();
        $data=[
            'title'=>'Data Gejala',
            'gejala' => $dataGejala
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/data-gejala');     
        echo view('templates/footer');
    }
    public function history()
    {
        $dataHistory = $this->historyModel();
        $data=[
            'title'=>'Data Pemeriksaan',
            'history' => $dataHistory
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/history-admin');    
        echo view('templates/footer');
    }
}
