<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderDetail extends Migration
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
            'order_id' => [
                'type' => 'INT'
            ],
            'product_id' => [
                'type' => 'INT',
            ],
            'option_id' => [
                'type' => 'INT'
            ],
            'qty' => [
                'type' => 'INT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'order', 'id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->addForeignKey('option_id', 'options', 'id');
        $this->forge->createTable('orderdetail');

        // Enable foreign key check
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('orderdetail');
    }
}
