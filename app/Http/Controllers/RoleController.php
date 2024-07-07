<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\File;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Read fixed roles from JSON file
        // $fixedRoles = json_decode(File::get(path:'database/json.roles.json'), true);
        $jsonPath = database_path('json/roles.json');
        $fixedRoles = json_decode(File::get($jsonPath), true);

        // Get dynamic roles from database
        $dbRoles = Role::all()->toArray();

        // Merge both sets of roles
        $roles = array_merge($fixedRoles, $dbRoles);

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
        $request->validate([
            'roleid' => 'required|unique:roles,role_id',
            'rolename' => 'required',
            'status' => 'required'
        ]);

        Role::create([
            'role_id' => $request->roleid,
            'role_name' => $request->rolename,
            'status' => $request->status
        ]);

        return redirect()->route('roles.index')->with('success', 'Role added successfully');
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
