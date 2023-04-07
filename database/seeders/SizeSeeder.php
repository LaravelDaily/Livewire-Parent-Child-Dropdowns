<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        Size::create(['name' => 'S', 'product_id' => 1]);
        Size::create(['name' => 'M', 'product_id' => 1]);
        Size::create(['name' => 'L', 'product_id' => 2]);
        Size::create(['name' => 'XL', 'product_id' => 2]);
        Size::create(['name' => 'XXL', 'product_id' => 3]);
        Size::create(['name' => 'S', 'product_id' => 3]);
        Size::create(['name' => 'M', 'product_id' => 4]);
        Size::create(['name' => 'L', 'product_id' => 4]);
        Size::create(['name' => 'XL', 'product_id' => 5]);
        Size::create(['name' => 'XXL', 'product_id' => 5]);
        Size::create(['name' => 'S', 'product_id' => 6]);
        Size::create(['name' => 'M', 'product_id' => 6]);
        Size::create(['name' => 'L', 'product_id' => 7]);
        Size::create(['name' => 'XL', 'product_id' => 7]);
        Size::create(['name' => 'XXL', 'product_id' => 8]);
        Size::create(['name' => 'S', 'product_id' => 8]);
        Size::create(['name' => 'M', 'product_id' => 9]);
        Size::create(['name' => 'L', 'product_id' => 9]);
        Size::create(['name' => 'XL', 'product_id' => 10]);
        Size::create(['name' => 'XXL', 'product_id' => 10]);
    }
}
