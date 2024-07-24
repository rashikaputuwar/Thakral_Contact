<?php

namespace App\Http\Controllers;

use App\Models\Menu;

use App\Models\MenuPermission;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('user_mg.menu', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('user_mg.add.addMenu',compact('permissions'));
        // return view('user_mg.add.addMenu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menuid' => 'required|unique:menus,menu_id',
            'menuname' => 'required',
            'status' => 'required',
            'permissions' => 'required|array'
        ]);

        try{
            DB::beginTransaction();
      
        $menu = Menu::create([
            'menu_id' => $request->menuid,
            'menu_name' => $request->menuname,
            'status' => $request->status,
        ]);

        foreach($request->permissions as $permissionId){
            MenuPermission::create([
                'menu_id' => $menu->id,
                'button_id' => $permissionId,
            ]);
        }

        DB::commit();
        return redirect()->route('menu.index')->with('success', 'Role added successfully');
    }catch (\Exception $e){
        DB::rollBack();
        return redirect()->back()->with('error');
    }
    
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $menu = Menu::find($id);
        // $menus = Menu::with('permissions')->get();
        // $permission = Permission :: find($id);
        $menus = Menu::with('permissions')->findOrFail($id);
        return view('user_mg.view.viewMenu',compact('menus'));
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
