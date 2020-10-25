<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MSekolah extends Migration
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
                    'nama_sekolah'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
					],
                    'npsn'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '25',
					],
                    'bentuk_pendidikan_id'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '25',
					],
                    'alamat'       => [
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
                    'rt'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
					],
                    'rw'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
					],
                    'nama_dusun'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
					],
                    'kode_pos'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
					],
                    'lintang'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
					],
                    'bujur'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
					]
				]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('mSekolah');
        }

        public function down()
        {
                $this->forge->dropTable('mSekolah');
        }
}
