<?php

namespace App\Http\Controllers;

use App\Models\add_user;
use App\Models\Client;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $clientsCount = Client::count();
        // $departmentsCount = Department::count();
        // $employeesCount = Employee::count();
        // $usersCount = add_user::count();

        // return view('dashboard', compact('clientsCount', 'departmentsCount', 'employeesCount', 'usersCount'));
    }
}
