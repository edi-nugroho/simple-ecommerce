<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UsersGroupModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = new UsersGroupModel;
        $faker = \Faker\Factory::create();

        $users->save([
            'user_id' => 1,
            'group_id' => 1
        ]);
    }
}
