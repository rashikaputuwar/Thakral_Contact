<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\add_user;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the superadmin user attributes
        $superadminData = [
            'user_name' => 'superadmin@gmail.com',
            'password' => Hash::make('superadminpassword'),
            'employee_id' => null, // Leave as null if not required
            'expiry_date' => now()->addYear(), // Set the expiry date to one year from now
            'status' => 'Active'
        ];

        // Create or update the superadmin user
        add_user::updateOrCreate(
            ['user_name' => 'superadmin'],
            $superadminData
        );
    }
}
