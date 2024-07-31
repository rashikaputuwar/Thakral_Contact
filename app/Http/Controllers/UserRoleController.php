<?php

namespace App\Http\Controllers;

use App\Models\add_user;
use App\Models\Role;
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
        return view('user_mg.userRole', compact('users'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = add_user::findOrFail($id);
        $roles = Role::all(); // Assuming you have a Role model to fetch all roles
        $userRoles = $user->roles->pluck('id')->toArray(); // Get user's current role IDs

        return view('update.updateUserRole', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = add_user::findOrFail($id);
    
    // Validate the request
    $request->validate([
        'roles' => 'array|required',
        'roles.*' => 'exists:roles,id',
    ]);

    // Update roles
    $user->roles()->sync($request->roles);

    return redirect()->route('userRole.index')->with('success', 'User roles updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
