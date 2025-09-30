<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => [
                'type' => 'INT', 
                'auto_increment' => true
            ],
           'email'         => [
                'type' => 'VARCHAR', 'constraint' => 255, 
                 'unique' => true
            ],
            'password_hash' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],

            'role' =>[
              'type'       => 'ENUM("admin","user")',
              'default'    => 'user'
            ],
            'name'          => [
                'type' => 'VARCHAR', 
                'constraint' => 100
            ],
            'active'        => [
                'type' => 'TINYINT', 
                 'default' => 1
            ],
            'created_at'    => [
                'type' => 'DATETIME', 
                'null' => true
            ],
            'updated_at'    => [
                'type' => 'DATETIME', 
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {

        $this->forge->dropTable('users');
    }
}
