<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $category = new Category();
        $faker = \Faker\Factory::create();

        $category->save([
            'category_name' => 'Tshirt'
        ]);

        $category->save([
            'category_name' => 'Pants'
        ]);
    }
}
