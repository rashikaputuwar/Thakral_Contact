<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleMenuPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menusPermissions = [
            // 'Contact' => ['View', 'Add', 'Delete'],
            'Employees' => ['Add','Save','View', 'Update', 'Export to Excel', 'Export to Pdf'],
            'Organization Details'=> ['Add','Save','View', 'Update', 'Export to Excel', 'Export to  Pdf'],
            'Contact Person Details'=> ['Add','Save','View', 'Update', 'Export to Excel', 'Export to Pdf'],
            'Visitors' => ['Check', 'Save', 'Update', 'Export to Excel', 'Export to Pdf'],
            'Departments' => ['Add','View','Save', 'Update'],
            'Designations' => ['Add','View','Save', 'Update'],
            'Role' => ['Add','View','Save', 'Update'],
            'Menu' => ['Add','View','Save', 'Update'],
            'User' => ['View', 'Add', 'Save', 'Update', 'Export to Excel', 'Export to Pdf'],
            'User Role' => ['View',  'Save', 'Update', 'Export to Excel', 'Export to Pdf'],
            'Role Menu' => ['View', 'Add', 'Save', 'Update', 'Export to Excel', 'Export to Pdf'],
            'Permissions' => ['View', 'Add', 'Save', 'Update'],
            
        ];

        // foreach ($menusPermissions as $menuName => $permissions) {
        //     $menu = Menu::where('menu_name', $menuName)->first();
        //     foreach ($permissions as $permissionName) {
        //         $permission = Permission::where('button_name', $permissionName)->first();
        //         DB::table('menu_permissions')->insert([
        //             // 'role_id' => 1, // Adjust role_id if necessary
        //             'menu_id' => $menu->id,
        //             'button_id' => $permission->id,
        //         ]);
        //     }
        // }

        foreach ($menusPermissions as $menuName => $permissions) {
            $menu = Menu::where('menu_name', $menuName)->first();
            if ($menu) {
                foreach ($permissions as $permissionName) {
                    $permission = Permission::where('button_name', $permissionName)->first();
                    if ($permission) {
                        DB::table('menu_permissions')->updateOrInsert(
                            ['menu_id' => $menu->id, 'button_id' => $permission->id]
                        );
                    }
                }
            }
        }
    
    }
}
