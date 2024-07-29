<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get dynamic roles from database
        $roles = Role::all();

        return view('user_mg.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_mg.add.addRole');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = DB::table('roles')
        ->insert([
            'role_id' => $request->roleid,
            'role_name' => $request->rolename,
            'status' => $request->status
        ]);
        // $request->validate([
        //     'roleid' => 'required|unique:roles,role_id',
        //     'rolename' => 'required',
        //     'status' => 'required'
        // ]);

        // Role::insert([
        //     'role_id' => $request->roleid,
        //     'role_name' => $request->rolename,
        //     'status' => $request->status
        // ]);

        return redirect()->route('roles.index')->with('success', 'Role added successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Role::find($id);
        return view('user_mg.view.viewRoles',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        // dd($user->status);
        return view('user_mg.edit.editRole', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = DB::table('roles')->where('id', $id)->update(['role_id' => $request->role_id,'role_name' => $request->role_name,
        'status' => $request->status,
        ]);

        if ($role) {
            return redirect()->route('roles.index', $id);
        } else {
            echo "<h2>Data Not Updated.</h2>";

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function syncFromJson()
    // {
    //     $jsonFile = storage_path('app/roles.json');
    //     $jsonData = file_get_contents($jsonFile);
    //     $roles = json_decode($jsonData, true)['roles'];

    //     foreach ($roles as $roleData) {
    //         Role::updateOrCreate(
    //             ['name' => $roleData['name']],
    //             ['description' => $roleData['description']]
    //         );
    //     }

    //     return redirect()->route('roles.index')->with('success', 'Roles synchronized successfully!');
    // }
}
