<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Options extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'option' => [
                'type' => 'VARCHAR',
                'constraint' => 5
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('options');
    }

    public function down()
    {
        $this->forge->dropTable('options');
    }
}
