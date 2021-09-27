<?php

namespace App\Controllers;

use App\Models\Survey;
use App\Models\Gejala;

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
        $dataGejala = $this->gejala();
        $data=[
            'title'=>'Cek Kesehatan',
            'gejala' => $dataGejala,
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar-user');
        echo view('templates/topbar');

        echo view('user/survey');
        
        echo view('templates/footer');
    }
    public function history()
    {
        $dataHistory = $this->historyModel();
        $data=[
            'title'=>'Riwayat Pemeriksaan',
            'history' => $dataHistory,
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
        $gejalaUser='';
        $hasil='';
        foreach ($dataGejala as $gj) {
            if($cek['gejala1'] == $gj['gejala1']){
                if($cek['gejala2'] == $gj['gejala2']){
                    if($cek['gejala3'] == $gj['gejala3']){
                        if($cek['gejala4'] == $gj['gejala4']){
                             $hasil = $gj['penyakit'];  
                             $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']. ", " . $cek['gejala3']. ", " . $cek['gejala4']);
                        }            
                        elseif ($cek['gejala4']=='null') {
                            $hasil = $gj['penyakit'];
                            $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']. ", " . $cek['gejala3']);
                        }
                    }        
                    elseif ($cek['gejala3']=='null') {
                        $hasil = $gj['penyakit'];
                        $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']);
                    }
                }                    
                elseif ($cek['gejala2']=='null') {
                    $hasil = $gj['penyakit'];
                    $gejalaUser = ($cek['gejala1']);
                }
            }
            elseif ($cek['gejala1']=='null') {
                $hasil = 'Tidak terindikasi';
                $gejalaUser = 'Tidak ada';
            }
            elseif ($hasil=='') {
                $hasil = 'Tidak Teridentifikasi';
                $gejalaUser = ($cek['gejala1']. ", " . $cek['gejala2']. ", " . $cek['gejala3'] . ", " . $cek['gejala4']);
            }
        }

        $this->historyModel->save([
            'nama' =>$this->request->getVar('namaUser'),
            'gejala' => $gejalaUser,
            'penyakit' => $hasil
        ]);
        
        session()->setFlashdata('msg','Cek kesehatan telah selesai!');
        return redirect('user/history');
    }
}
