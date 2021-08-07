<?php

namespace Database\Seeders;

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::factory()
        ->count(20)
        ->create();
    }
}