<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buttons = [
            [
                
                'button_name' => 'Save',
                // 'status' => 'Yes',
            ],
            [
                
                'button_name' => 'Delete',
                // 'status' => 'Yes',
            ],
            [
                
                'button_name' => 'Update',
                // 'status' => 'Yes',
            ],
            [
                
                'button_name' => 'View',
                // 'status' => 'Yes',
            ],
            
        ];

        // Insert data into the database using DB facade
        DB::table('permissions')->insert($buttons);
    }
}
