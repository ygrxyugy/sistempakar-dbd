<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $dataHistory = $this->historyModel();
        $dataGejala = $this->gejala();
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $data=[
            'title'=>'Admin Dashboard',
            'gejala' => $dataGejala,
            'history' => $dataHistory,
            'user' => $dataUser->username
        ];   
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/index');
        echo view('templates/footer');
    }


    public function dataUser()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $data=[
            'title'=>'Data Pengguna',
            'user' => $dataUser->username
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');

        echo view('admin/data-user');
        
        echo view('templates/footer');
    }

    public function dataGejala()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataGejala = $this->gejala();
        $data=[
            'title'=>'Data Gejala',
            'gejala' => $dataGejala,
            'user' => $dataUser->username
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/data-gejala');     
        echo view('templates/footer');
    }
    public function history()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataHistory = $this->historyModel();
        $data=[
            'title'=>'Data Pemeriksaan',
            'history' => $dataHistory,
            'user' => $dataUser->username
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-admin');
        echo view('templates/topbar');
        echo view('admin/history-admin');    
        echo view('templates/footer');
    }
}
