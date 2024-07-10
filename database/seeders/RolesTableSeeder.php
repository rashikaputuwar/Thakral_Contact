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
        $roles = [
            [
                'role_id' => 'R001',
                'role_name' => 'Super Administrator',
                'status' => 'Yes',
            ],
            [
                'role_id' => 'R002',
                'role_name' => 'Administrator',
                'status' => 'Yes',
            ],
            [
                'role_id' => 'R003',
                'role_name' => 'Officer',
                'status' => 'Yes',
            ],
            [
                'role_id' => 'R004',
                'role_name' => 'Data Entry',
                'status' => 'Yes',
            ],
            [
                'role_id' => 'R005',
                'role_name' => 'Report Viewer',
                'status' => 'Yes',
            ],
        ];

        // Insert data into the database using DB facade
        DB::table('roles')->insert($roles);
    }
}
