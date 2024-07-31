<?php

namespace App\Http\Controllers;

use App\Models\add_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // For DB facade
use Illuminate\Support\Facades\Session;
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
    public function check(Request $request)
    {
        // Validate the request data
    $request->validate([
        'user_name' => 'required|string',
        'password' => 'required|string',
    ]);
    
    // Retrieve the user by username
    $user = add_user::where('user_name', $request->user_name)->first();

    
    
    // Check if user exists and the password is correct
    if ($user && Hash::check($request->password, $user->password)) {
        // Authentication passed
        Auth::login($user);
        $userWithEmployee = DB::table('add_users as a')
        ->join('employees as e', 'a.employee_id', '=', 'e.id')
        ->where('a.id', '=', $user->id)
        ->select('e.id', 'e.fname', 'e.lname')
        ->first();
            
            if ($userWithEmployee) {
                $userRoles = DB::table('userroles')
                ->where('employee_id', '=', $userWithEmployee->id)
                ->pluck('role_id'); // Fetches all role_ids as a collection

                $roleMenus = DB::table('role_menu_permissions')
                ->whereIn('role_id', $userRoles) // Use whereIn to handle multiple role_ids
                ->get(['role_id', 'menu_id', 'permission_id']); // Fetch multiple columns

               
        
            // Store data in session
            session([
                'employee_id' => $userWithEmployee->id,
                'employee_fname' => $userWithEmployee->fname,
                'employee_lname' => $userWithEmployee->lname,
                'role_ids' => $userRoles,
                'role_menus' => $roleMenus, // Store the collection of role menus and permissions
            ]);
            }
            
        return redirect()->route('welcomePage');
    } else {
        // Authentication failed
        return view('login')->withErrors('Invalid Username or password');
    }
    }

    public function isLoggedIn()
    {
    
        if (Auth::check()) {
            // The user is logged in
            $user = Auth::user(); // Correct method to get the authenticated user
            return response()->json(['message' => 'User is logged in', 'user' => $user], 200);
        } else {
            // The user is not logged in
            return response()->json(['message' => 'User is not logged in'], 401);
        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function logout()
    {
         // Log out the user
        Auth::logout();

        // Clear all session data
        Session::flush();

        // Redirect to the login page or home page
        return redirect()->route('login.index');
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
    //     //
    }
 } 