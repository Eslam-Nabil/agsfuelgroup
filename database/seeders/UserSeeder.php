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
        //
        User::create([
            "id"=>"1",
            "name"=> "Admin",
            "email"=>"eslam@technex-eg.com",
            "phone"=>"01234567890",
            "password"=>Hash::make('admin_ism'),

         ]);
    }
}
