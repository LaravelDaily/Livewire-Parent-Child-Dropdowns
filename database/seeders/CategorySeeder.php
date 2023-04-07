<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Clothes']);
        Category::create(['name' => 'Electronics']);
        Category::create(['name' => 'Food']);
    }
}
