<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleMenuPermission;
use Illuminate\Http\Request;

class RoleMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Role::with(['menus.permissions'])->get();
        $roles = Role::with(['menus' => function ($query) {
            $query->with('permissions');
        }])->get();
        return view('user_mg.roleMenu', compact('roles'));
        // return view('user_mg.roleMenu');
    }

//     public function index(Request $request)
// {
//     $roles = Role::with('menus.permissions')->get();
//     $selectedRole = null;
//     $menus = [];

//     if ($request->has('role_id')) {
//         $selectedRole = Role::with('menus.permissions')->find($request->role_id);
//         $menus = $selectedRole ? $selectedRole->menus : [];
//     }

//     return view('user_mg.roleMenu', compact('roles', 'selectedRole', 'menus'));
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $rolesWithOutPermissions = Role::whereDoesntHave('permissions')
        ->get();
        // $pemission = Permission::where('status', 'yes')->get();
        // return view('user_mg.add.addMenu',compact('menuWithOutPermissions','permission'));
        // // 
        // $roles = Role::all();
        $permissions = Permission::all();
        $menus = Menu::with('permissions')->get();
    //    return view('user_mg.add.addRoleMenu',compact('roles','permissions','menus'));
       return view('user_mg.add.addRoleMenu',compact('rolesWithOutPermissions','permissions','menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request ->validate([ 
            'role_id' => 'required|integer',
            'menus' => 'required|array',
            'permissions' => 'required|array',
            
            ]);

            
        $role_id = $request->input('role_id');
        $selectedMenus = $request->input('menus');
        $selectedPermissions = $request->input('permissions');


        foreach($selectedMenus as $menuId){
            if(isset($selectedPermissions[$menuId])){
                foreach($selectedPermissions[$menuId] as $permissionId){

                    RoleMenuPermission::create([
                        'role_id' => $role_id,
                        'menu_id' => $menuId,
                        'permission_id' => $permissionId,
                    ]);
                }
            }
        }
        return redirect()->route('rolesMenu.index')->with('success', 'Permissions assigned successfully!');
        // dd($request->all());
       
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
