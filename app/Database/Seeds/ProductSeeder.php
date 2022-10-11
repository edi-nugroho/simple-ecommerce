<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product = new Product;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) { 
            $product->save([
                'name' => $faker->name,
                'price' => 500000,
                'is_discount' => 1
            ]);
        }
    }
}
