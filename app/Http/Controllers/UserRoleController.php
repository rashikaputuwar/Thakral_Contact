<?php

namespace App\Http\Controllers;

use App\Models\add_user;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = add_user::with(['employee', 'roles'])->get();
            // $users = UserRole::with('roles')->get();
            // dd($users);
        return view('user_mg.userRole',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show($id)
{
    $user = User::with('employee')->findOrFail($id);
   
    $roles = $user->roles; // Assuming a user has many roles
    
    
     return view('user_mg.view.UserRoleView', compact('user', 'roles'));
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
