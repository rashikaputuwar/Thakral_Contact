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
            [
                
                'menu_name' => 'Contact',
                
            ],
            [
                
                'menu_name' => 'Employees',
               
            ],
            [
                
                'menu_name' => 'Person/Organization',
              
            ],
            [
                
                'menu_name' => 'Visitors',
               
            ],
            [
                
                'menu_name' => 'Departments',
               
            ],
            [
                
                'menu_name' => 'User Management',
               
            ],
            [
                
                'menu_name' => 'Configuration',
               
            ],
            
        ];

        // Insert data into the database using DB facade
        DB::table('menus')->insert($menus);
    
    }
}
