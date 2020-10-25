<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kota extends Migration
{
	public function up()
        {
                $this->forge->addField([
					'id' => [
						'type' => 'INT',
						'constraint' => 11,
						'unsigned' => TRUE,
						'auto_increment' => TRUE
					],
					'username' => [
						'type' => 'VARCHAR',
						'constraint' => '255'
					],
					'email' => [
						'type' => 'VARCHAR',
						'constraint' => '255'
					],
					'date' => [
						'type' => 'TIMESTAMP',
					],
					'upload_image' => [
						'type' => 'INT',
						'constraint' => '11',
					],
					'upload_file' => [
						'type' => 'INT',
						'constraint' => '11'
					],
					'upload_doc' => [
						'type' => 'INT',
						'constraint' => '11'
					],
					'upload_pdf' => [
						'type' => 'INT',
						'constraint' => '11'
					],
					'big_file' => [
						'type' => 'INT',
						'constraint' => '11'
					]
				]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('kota');
        }

        public function down()
        {
                $this->forge->dropTable('kota');
        }
}
