<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tablacategorias extends Migration
{
	public function up()
	{
			$this->forge->addField([
					'id'          => [
							'type'           => 'INT',
							'constraint'     => 5,
							'unsigned'       => true,
							'auto_increment' => true,
					],
					'nombre'       => [
							'type'       => 'VARCHAR',
							'constraint' => '100',
					],
					'rutaImg'       => [
							'type'       => 'VARCHAR',
							'constraint' => '100',
					],
		
			]);
			$this->forge->addKey('id', true);
			$this->forge->createTable('categorias');
	}

	public function down()
	{
			$this->forge->dropTable('categorias');
	}
}
