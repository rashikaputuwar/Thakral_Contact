<?php

namespace App\Http\Controllers;

use App\Models\add_user;
use App\Models\Client;
use App\Models\Department;
use App\Models\Employee;
use App\Models\RoleMenuPermission;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function check(Request $request)
    // {
    //     // Validate the request data
    // $request->validate([
    //     'user_name' => 'required|string',
    //     'password' => 'required|string',
    // ]);
    
    // // Retrieve the user by username
    // $user = add_user::where('user_name', $request->user_name)->first();

    

    // // Check if user exists and the password is correct
    // if ($user && Hash::check($request->password, $user->password)) {
    //     // Authentication passed
    //     Auth::login($user);
    //     return redirect()->route('welcomePage');
    // } else {
    //     // Authentication failed
    //     return view('login')->withErrors('Invalid Username or password');
    // }
    // }

    public function loginUser(Request $request){
        $credentials = $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $employee = $user->employee;
    
            if ($employee) {
                $firstRole = $employee->roles()->first();
                $roleName = $firstRole ? $firstRole->role_name : 'No Role Assigned';
                $userRoles = $employee->roles->pluck('role_name')->toArray(); // Assuming roles have 'role_name'
                
                // Store data in session
                session([
                    'employee_id' => $employee->id,
                    'employee_fname' => $employee->fname,
                    'employee_lname' => $employee->lname,
                    'userRole' => $userRoles ? $userRoles[0] : 'No Role Assigned', // Store the first role
                    
                ]);
            }
    
            $clientsCount = Client::count();
            $departmentsCount = Department::count();
            $employeesCount = Employee::count();
            $usersCount = add_user::count();
    
            return view('welcome', compact('clientsCount', 'departmentsCount', 'employeesCount', 'usersCount'));
            // return redirect()->route('dashboard');
        } else {
            return view('login')->withErrors(['Invalid Username or password']);
        }
    }

    

    public function dashboardPage(Request $request)
    {
        if (Auth::check()) {
            // Retrieve user from Auth
            // $user = Auth::user();

            // Fetch roles from the request (set by middleware)
            // $userRoles = $request->input('userRoles', []);
            $clientsCount = Client::count();
            $departmentsCount = Department::count();
            $employeesCount = Employee::count();
            $usersCount = add_user::count();
            return view('welcome', compact('clientsCount', 'departmentsCount', 'employeesCount', 'usersCount'));
        } else {
            // return redirect()->route('login.index');
        }
    }
    // public function dashboardPage(){
    //     return view('welcome');
    //     // if(Auth::check()){
    //     //     return view('welcome');
    //     // }
    //     // else{
    //     //     return redirect()->route('login.index');
    //     // }
    // }

    public function logout(){

        // session()->flush();
        Auth::logout();
        return redirect()->route('login.index');
    }
    // public function isLoggedIn()
    // {
    
    //     if (Auth::check()) {
    //         // The user is logged in
    //         $user = Auth::user(); // Correct method to get the authenticated user
    //         return response()->json(['message' => 'User is logged in', 'user' => $user], 200);
    //     } else {
    //         // The user is not logged in
    //         return response()->json(['message' => 'User is not logged in'], 401);
    //     }
    // }


    public function deleteSession(){
        session()->flush();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
