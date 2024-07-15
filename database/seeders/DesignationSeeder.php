<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designation = 
        [
            [
                // "designation_id" => "D001",
                "desig_name" => "Chief Technology Officer",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D002",
                "desig_name" => "IT Manager",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D003",
                "desig_name" => "Senior Software Engineer",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D004",
                "desig_name" => "Software Engineer",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D005",
                "desig_name" => "Junior Software Engineer",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D006",
                "desig_name" => "Database Administrator",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D007",
                "desig_name" => "Network Administrator",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D008",
                "desig_name" => "Security Specialist",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D009",
                "desig_name" => "System Analyst",
                // "status" => "Yes"
            ],
            [
                // "designation_id" => "D010",
                "desig_name" => "Technical Support Specialist",
                // "status" => "Yes"
            ]

        ];
        
        DB::table("designations")->insert($designation);

    }
}
