<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
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
            'category_id' => [
                'type' => 'INT',
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'price' => [
                'type' => 'INT'
            ],
            'is_discount' => [
                'type' => 'INT',
                'constraint' => '1'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'category', 'id');
        $this->forge->createTable('products');

        // Enable foreign key check
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
