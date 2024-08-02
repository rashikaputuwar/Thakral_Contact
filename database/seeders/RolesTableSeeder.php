<?php

namespace Database\Seeders;

use App\Models\Role;
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
                'role_name' => 'Head Of Department - HOD',
                'status' => 'Yes',
            ],
            [
                'role_id' => 'R004',
                'role_name' => 'Data Entry',
                'status' => 'Yes',
            ],
            [
                'role_id' => 'R005',
                'role_name' => 'Employee',
                'status' => 'Yes',
            ],
            [
                'role_id' => 'R006',
                'role_name' => 'Acting Head Of Department',
                'status' => 'Yes',
            ],
        ];

        // Insert data into the database using DB facade
        DB::table('roles')->insert($roles);
        // foreach ($roles as $role) {
        //     Role::updateOrCreate(
        //         ['role_id' => $role['role_id']], // Match condition
        //         $role // Values to insert/update
        //     );
        // }
    }
}
