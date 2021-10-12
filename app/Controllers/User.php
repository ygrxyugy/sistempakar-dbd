<?php

namespace App\Controllers;
use App\Models\Profile;

class User extends BaseController
{
    public function index()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user()->username;
        $dataGejala = $this->gejala();
        $dataHistory = $this->historyModel->findColumn('nama');
        $i=0;
        foreach ($dataHistory as $hs){
            if($hs == $dataUser){
                $i++;
            }
        }
        $data=[
            'title'=>'User Dashboard',
            'gejala' => $dataGejala, 
            'history' => $i,
            'user' => $dataUser
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/index');
        
        echo view('templates/footer');
    }


    public function profile()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();

        // Get data profil user
        $profileModel = $this->profileModel;
        $usernameTable = $this->profileModel->findColumn('username');
        foreach ($usernameTable as $un_Table) {            
            if ($un_Table = $dataUser->username) {
                foreach ($profileModel->findAll() as $findUser) {
                    if ($findUser['username'] == $dataUser->username) {
                        $dataProfile = $findUser;
                    }
                }
            }
        }

        if (isset($dataProfile)) {
            $data=[
                'title'=>'Profile',
                'id' => $dataProfile['id'],
                'user' => $dataProfile['username'],
                'email' => $dataProfile['email'],
                'nama' => $dataProfile['nama'],
                'tempat_lahir' => $dataProfile['tempat_lahir'],
                'tanggal_lahir' => $dataProfile['tanggal_lahir'],
                'gender' => $dataProfile['gender'],
                'alamat' => $dataProfile['alamat'],
            ]; 
        }        
        elseif (!isset($dataProfile)) {
            $msg = 'null';
            $data=[
                'title'=>'Profile',
                'id' => $dataUser->id,
                'user' => $dataUser->username,
                'email' => $dataUser->email,
                'nama' => $msg,
                'tempat_lahir' => $msg,
                'tanggal_lahir' => $msg,
                'gender' => $msg,
                'alamat' => $msg,
            ]; 
        }        

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/profile');
        
        echo view('templates/footer');
    }

    public function survey()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user()->username;
        $dataGejala = $this->gejala();

        // Get data profil user
        $profileModel = $this->profileModel;
        $usernameTable = $this->profileModel->findColumn('username');
        foreach ($usernameTable as $un_Table) {            
            if ($un_Table = $dataUser) {
                foreach ($profileModel->findAll() as $findUser) {
                    if ($findUser['username'] == $dataUser) {
                        $dataProfile = $findUser;
                    }
                }
            }
        }
        $data=[
            'title'=>'Cek Kesehatan',
            'gejala' => $dataGejala,
            'user' => $dataUser
        ];
        if (isset($dataProfile)) {
            echo view('templates/header', $data);
            echo view('templates/sidebar-user');
            echo view('templates/topbar');
            echo view('user/survey');
            echo view('templates/footer');
        }
        if (!isset($dataProfile)){
            session()->setFlashdata('msg','Silahkan lengkapi data profile terlebih dahulu');
            return redirect('user/profile');
        }
    }

    public function history()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataHistory = $this->historyModel();
        $data=[
            'title'=>'Riwayat Pemeriksaan',
            'history' => $dataHistory['history'],
            'user' => $dataUser->username
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/history');
        
        echo view('templates/footer');
    }

    public function save(){
        $cek = $this->request->getVar();
        $dataGejala = $this->gejalaModel->findAll(); 
        $keterangan='';
        $gejalaUser='';
        $hasil='';
        foreach ($dataGejala as $gj) {
            if($cek['gejala1'] == $gj['gejala1']){
                if($cek['gejala2'] == $gj['gejala2']){
                    if($cek['gejala3'] == $gj['gejala3']){
                        if($cek['gejala4'] == $gj['gejala4']){
                             $hasil = $gj['penyakit'];
                             $keterangan = $gj['keterangan'];
                             $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']. ", " . $cek['gejala3']. ", " . $cek['gejala4']);
                        }            
                        elseif ($cek['gejala4']=='null') {
                            $hasil = $gj['penyakit'];
                            $keterangan = $gj['keterangan'];
                            $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']. ", " . $cek['gejala3']);
                        }
                    }        
                    elseif ($cek['gejala3']=='null') {
                        $hasil = $gj['penyakit'];
                        $keterangan = $gj['keterangan'];
                        $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']. ", " . $cek['gejala4']);
                    }
                }                    
                elseif ($cek['gejala2']=='null') {
                    $hasil = $gj['penyakit'];
                    $keterangan = $gj['keterangan'];
                    $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala3'] . ", " . $cek['gejala4']);
                }
            }
            elseif ($cek['gejala1'] =='null') {
                $hasil = $gj['penyakit'];
                $keterangan = $gj['keterangan'];
                $gejalaUser = ($cek['gejala2']. ", " . $cek['gejala3'] . ", " . $cek['gejala4']);
            }
            elseif ($hasil=='') {
                $hasil = 'Tidak Teridentifikasi';
                $keterangan = 'Anda tidak terindikasi penyakit jantung atau tidak ada penyakit yang sesuai dalam database kami. Namun, bila sakit berlanjut, harap segera hubungi dokter.';
                $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']. ", " . $cek['gejala3'] . ", " . $cek['gejala4']);
            }
        }
        $this->historyModel->save([
            'nama' =>$this->request->getVar('namaUser'),
            'gejala' => $gejalaUser,
            'penyakit' => $hasil,
            'keterangan' => $keterangan
        ]);
        session()->setFlashdata('msg','Cek kesehatan telah selesai!');
        return redirect('user/history');
    }

    public function edit(){
        $cek = $this->request->getVar();
        $username = $this->request->getVar('username');
        
        // Get data profil user
        $profileModel = $this->profileModel;
        $usernameTable = $this->profileModel->findColumn('username');
        foreach ($usernameTable as $un_Table) {            
            if ($un_Table = $username) {
                foreach ($profileModel->findAll() as $findUser) {
                    if ($findUser['username'] == $username) {
                        $dataProfile = $findUser;
                    }
                }
            }
        }
        if (isset($dataProfile)) {
            $id = $dataProfile['id'];
            $this->profileModel->update($id, [
                'username' =>$this->request->getVar('username'),
                'nama' =>$this->request->getVar('nama'),
                'tempat_lahir' =>$this->request->getVar('tempat_lahir'),
                'tanggal_lahir' =>$this->request->getVar('tanggal_lahir'),
                'gender' =>$this->request->getVar('gender'),
                'email' =>$this->request->getVar('email'),
                'alamat' =>$this->request->getVar('alamat'),
            ]);
        }  
        elseif (!isset($dataProfile)) {
            $this->profileModel->save([
                'username' =>$this->request->getVar('username'),
                'nama' =>$this->request->getVar('nama'),
                'tempat_lahir' =>$this->request->getVar('tempat_lahir'),
                'tanggal_lahir' =>$this->request->getVar('tanggal_lahir'),
                'gender' =>$this->request->getVar('gender'),
                'email' =>$this->request->getVar('email'),
                'alamat' =>$this->request->getVar('alamat'),
            ]);
        }

        session()->setFlashdata('msg','Update data profil telah berhasil');
        return redirect('user/profile');

    }

    public function getDataKeterangan(){
        $id =  $_POST['id'];
        $dataHistory = $this->historyModel();
        foreach ($dataHistory['history'] as $hs) {
            if ($hs['id'] == $id) {
                echo json_encode($hs);
            }
        }
    }

    public function getDataUser(){
        $id =  $_POST['id'];
        $auth = $this->authService();
        $dataUser = $this->auth->user();

        // Get data profil user
        $profileModel = $this->profileModel;
        $usernameTable = $this->profileModel->findColumn('username');
        foreach ($usernameTable as $un_Table) {            
            if ($un_Table = $dataUser->username) {
                foreach ($profileModel->findAll() as $findUser) {
                    if ($findUser['username'] == $dataUser->username) {
                        $dataProfile = $findUser;
                    }
                }
            }
        }
        if (isset($dataProfile)) {
            echo json_encode($dataProfile);
        }
        if (!isset($dataProfile)) {
            $data = [
                'id' => $dataUser->id,
                'username' => $dataUser->username,
                'email' => $dataUser->email,
            ];   
            echo json_encode($data);
        }
    }
}
