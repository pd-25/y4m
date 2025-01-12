<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            "name" => "Admin Youth4America",
            "email" => "admin@mail.com",
            "password" => Hash::make("12345"),
            "slug" => "admin1-america",
      
        ]);
    }
}
