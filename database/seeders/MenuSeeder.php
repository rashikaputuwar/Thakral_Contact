<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
                
                [ 'menu_name' => 'Contact'],
                [ 'menu_name' => 'Employees'],
                [ 'menu_name' => 'Person/Organization'],
                [ 'menu_name' => 'Organization Details'],
                [ 'menu_name' => 'Contact Person Details'],
                [ 'menu_name' => 'Visitors'],
                [ 'menu_name' => 'User Mgmt'],
                [ 'menu_name' => 'User'],
                [ 'menu_name' => 'Role'],
                [ 'menu_name' => 'Menu'],
                [ 'menu_name' => 'Role Menu'],
                [ 'menu_name' => 'User Role'],
                [ 'menu_name' => 'Configuration'],
                [ 'menu_name' => 'Designation'],
                [ 'menu_name' => 'Department'],
                [ 'menu_name' => 'Permission'],
            
        ];

        // Insert data into the database using DB facade
        DB::table('menus')->insert($menus);
    
    }
}
