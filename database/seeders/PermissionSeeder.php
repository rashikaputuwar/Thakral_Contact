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
                'button_name' => 'Add', 
            ],
            [
                'button_name' => 'Save',
            ],
            [
                'button_name' => 'Update',
            ],
            [
                'button_name' => 'View',
            ],
            [
                'button_name' => 'Export to Excel',
            ],
            [
                'button_name' => 'Export to Pdf',
            ],
            [
                'button_name' => 'Check',
            ],
            
        ];

        // Insert data into the database using DB facade
        DB::table('permissions')->insert($buttons);
    }
}
