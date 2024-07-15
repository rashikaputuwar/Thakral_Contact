<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = [
            ["dept_name" => "Information Technology"],
            ["dept_name" => "Software Development"],
            ["dept_name" => "Database Management"],
            ["dept_name" => "Networking"],
            ["dept_name" => "Security"],
            ["dept_name" => "Technical Support"],
            ["dept_name" => "System Analysis"],
            ["dept_name" => "Project Management"],
            ["dept_name" => "Quality Assurance"],
            ["dept_name" => "Human Resources"],
        ];
        DB::table("departments")->insert($department);

        
    }
}
