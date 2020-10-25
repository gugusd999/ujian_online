<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MAgama extends Migration
{
	public function up()
        {
                $this->forge->addField([
                    'kode'          => [
                            'type'           => 'INT',
                            'constraint'     => 2
                    ],
                    'nama'       => [
                            'type'           => 'VARCHAR',
                            'constraint'     => '255',
                    ]
                ]);
                $this->forge->createTable('mAgama');
        }

        public function down()
        {
                $this->forge->dropTable('mAgama');
        }
}
