<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Baby',
            'image' => "https://images.indianexpress.com/2019/03/baby-sit-up.jpg",
            'number_products' => 0
        ]);
        Category::create([
            'name' => 'Toys',
            'image' => "https://i.inews.co.uk/content/uploads/2020/08/PRI_161866471-640x360.jpg",
            'number_products' => 1
        ]);
        Category::create([
            'name' => 'Electronics',
            'image' => "https://cdnb.artstation.com/p/marketplace/presentation_assets/000/270/721/large/file.jpg?1579196573",
            'number_products' => 2
        ]);
        Category::create([
            'name' => 'Clothes',
            'image' => "https://static.independent.co.uk/s3fs-public/thumbnails/image/2019/04/10/16/online-clothes-shops-hero.jpg",
            'number_products' => 3
        ]);
    }
}