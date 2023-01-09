<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventory extends Migration
{
    public function up()
    {
        // Disable foreign key check
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'product_id' => [
                'type' => 'INT'
            ],
            'option_id' => [
                'type' => 'INT'
            ],
            'stock' => [
                'type' => 'INT',
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->addForeignKey('option_id', 'options', 'id');
        $this->forge->createTable('inventory');

        // Enable foreign key check
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('inventory');
    }
}
