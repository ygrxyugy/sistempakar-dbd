<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataGejala = $this->gejala();

        $data=[
            'title'=>'User Dashboard',
            'gejala' => $dataGejala,
            'user' => $dataUser->username
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
        $dataProfile = $this->profileModel();

        foreach ($dataProfile['profile'] as $profileUser) {
            if ($profileUser['username']==$dataUser->username) {
                $data = $profileUser;
            }
            else{
                $data = 'Silahkan update profile terlebih dahulu';
            }
        }
        $send=[
            'title'=>'Profile',
            'id' => $dataUser->id,
            'user' => $data['username'],
            'email' => $data['email'],
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'gender' => $data['gender'],
            'alamat' => $data['alamat'],
        ];
        echo view('templates/header', $send);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/profile');
        
        echo view('templates/footer');
    }

    public function survey()
    {
        $auth = $this->authService();
        $dataUser = $this->auth->user();
        $dataGejala = $this->gejala();
        $data=[
            'title'=>'Cek Kesehatan',
            'gejala' => $dataGejala,
            'user' => $dataUser->username
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/survey');
        
        echo view('templates/footer');
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
                        $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']);
                    }
                }                    
                elseif ($cek['gejala2']=='null') {
                    $hasil = $gj['penyakit'];
                    $keterangan = $gj['keterangan'];
                    $gejalaUser = ($cek['gejala1']);
                }
            }
            elseif ($cek['gejala1'] =='null') {
                $hasil = 'Tidak terindikasi';
                $keterangan = 'Anda tidak terindikasi penyakit jantung';
                $gejalaUser = 'Tidak ada';
            }
            elseif ($hasil=='') {
                $hasil = 'Tidak Teridentifikasi';
                $keterangan = 'Penyakit tidak terindentifikasi dalam database kami. Namun, bila sakit berlanjut, harap segera hubungi dokter.';
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
        $dataProfil = $this->profileModel->findAll();
        
        $this->profileModel->save([
            'username' =>$this->request->getVar('username'),
            'nama' =>$this->request->getVar('nama'),
            'tempat_lahir' =>$this->request->getVar('tempat_lahir'),
            'tanggal_lahir' =>$this->request->getVar('tanggal_lahir'),
            'gender' =>$this->request->getVar('gender'),
            'email' =>$this->request->getVar('email'),
            'alamat' =>$this->request->getVar('alamat'),
        ]);
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
        $dataProfile = $this->profileModel();
        foreach ($dataProfile['profile'] as $dp) {            
            $data = [
                'id' => $dataUser->id,
                'username' => $dataUser->username,
                'email' => $dataUser->email,
                'nama' => $dp['nama'],
                'tempat_lahir' => $dp['tempat_lahir'],
                'tanggal_lahir' => $dp['tanggal_lahir'],
                'gender' => $dp['gender'],
                'alamat' => $dp['alamat']
            ];
        }
        if ($dataUser->id == $id) {
            echo json_encode($data);
        }
    }
}
