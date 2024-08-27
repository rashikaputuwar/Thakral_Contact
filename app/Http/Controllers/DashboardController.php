<?php

namespace App\Http\Controllers;

use App\Models\add_user;
use App\Models\Client;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showProfile()
    {
         $userId = Auth::id();
        //  $user = add_user::with('employee.designation', 'employee.department')->find($userId);
        $user = add_user::with('employee')->find($userId);
        // dd($user->employee);
        return view('pages.profile', ['user' => $user]);
    }
}
