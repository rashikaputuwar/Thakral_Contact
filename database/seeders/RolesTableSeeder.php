<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to your JSON file
        $jsonPath = database_path('json/roles.json');
        
        // Read the file
        $json = File::get($jsonPath);
        
        // Decode JSON data
        $roles = json_decode($json, true);
        
        // Insert data into the roles table
        DB::table('roles')->insert($roles);
    }
}
