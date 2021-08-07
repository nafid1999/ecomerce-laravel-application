<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       
        User::create([
            'name' => 'amine',
            'email' => 'aminnafid.1999@gmail.com',
            'password' => Hash::make("123456789"),
            'tel' => "0746363233"
        ]);
    }
}