<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;


class AdminSeeder extends Seeder{
    public function run()
    {
      $data = [
        'name'      => 'admin',
        'email'         => 'admin@gmail.com',
        'password_hash' => password_hash('admin', PASSWORD_DEFAULT),
        'role'          => 'admin',
        'active'        => 1,
        'created_at'    => date('Y-m-d H:i:s'),
        'updated_at'    => date('Y-m-d H:i:s'),
      ];

        $this->db->table('users')->insert($data);
    }
}
