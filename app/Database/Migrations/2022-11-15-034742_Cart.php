<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
    public function up()
    {
        // Disable foreign key check
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'int',
                'unsigned' => true
            ],
            'product_id' => [
                'type' => 'int'
            ],
            'qty' => [
                'type' => 'int'
            ],
            'total' => [
                'type' => 'int'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->createTable('cart');

        // Enable foreign key check
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}
