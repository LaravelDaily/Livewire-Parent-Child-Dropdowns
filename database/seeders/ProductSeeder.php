<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create(['name' => 'T-Shirt', 'category_id' => 1]);
        Product::create(['name' => 'Pants', 'category_id' => 1]);
        Product::create(['name' => 'Hoodies', 'category_id' => 1]);

        Product::create(['name' => 'TV', 'category_id' => 2]);
        Product::create(['name' => 'Laptop', 'category_id' => 2]);
        Product::create(['name' => 'Smartwatch', 'category_id' => 2]);

        Product::create(['name' => 'Milk', 'category_id' => 3]);
        Product::create(['name' => 'Sugar', 'category_id' => 3]);
        Product::create(['name' => 'Flour', 'category_id' => 3]);
        Product::create(['name' => 'Butter', 'category_id' => 3]);
    }
}
