<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserSekolah extends Migration
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
                        'nama'  => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],
                        'mPendidikan'       => [
                                'type'           => 'INT',
                                'constraint'     => '11',
                        ],
                        'alamat' => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],
                        'desa_kelurahan'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],
                        'kecamatan'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '11',
                        ],
                        'kabupaten_kota'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '11',
                        ],
                        'provinsi'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],
                        'notelp'       => [
                                'type'           => 'INT',
                                'constraint'     => '255',
                        ],
                        'email'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],
                        'user'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],
                        'password'       => [
                                'type'           => 'TEXT',
                        ]
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('userSekolah');
        }

        public function down()
        {
                $this->forge->dropTable('userSekolah');
        }
}
