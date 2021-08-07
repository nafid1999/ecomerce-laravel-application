<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'tel_help' => '0706363231',
            'email_help' => 'boukiShop@gmail.com',
            'shippment' => 'El amana'
        ]);
    }
}