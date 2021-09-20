<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SurveySeeder extends Seeder
{
        public function run()
        {
                $data = [   
                    [
                        'namaUser' => 'Budi',
                        'count' => '1',
                        'gejala' => 'pusing',
                        'jawaban' => 'ya'
                    ],                
                    [
                        'namaUser' => 'Andi',
                        'count' => '1',
                        'gejala' => 'lemas',
                        'jawaban' => 'ya'
                    ]            
                ];

                // Using Query Builder
                $this->db->table('survey')->insertBatch($data);
        }
}