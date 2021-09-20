<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Survey extends Migration
{
    public function up()
    {
        $this->forge->addField([
                'id'          => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'unsigned'       => true,
                        'auto_increment' => true,
                ],
                'namaUser'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                ],
                'count'          => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '255',
                ],
                'gejala'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala1'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala2'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala3'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala4'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala5'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala6'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala7'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala8'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala9'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala10'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala11'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala12'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
                'gejala13'       => [
                        'type'       => 'VARCHAR',
                        'constraint' => '100',
                ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('survey');
    }

    public function down()
    {
        $this->forge->dropTable('survey');
    }
}
