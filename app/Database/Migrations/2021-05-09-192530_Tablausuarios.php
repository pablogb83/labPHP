<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tablausuarios extends Migration
{
	public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                //'unsigned'       => true,
                                'auto_increment' => true,
                        ],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
                        'nick' => [
                                'type'       => 'VARCHAR',
				'constraint' => '100',
                        ],

                        'password' => [
                                'type'       => 'VARCHAR',
				'constraint' => '100',
                        ],
                        
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('usuarios');
        }

        public function down()
        {
                $this->forge->dropTable('usuarios');
        }
}
