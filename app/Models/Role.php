<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['role_id', 'role_name','status'];

    public function employees(){
        return $this->belongsToMany(Employee::class,'userroles','role_id','employee_id');
    }
    public function menus(){
        return $this->belongsToMany(Menu::class, 'role_menu_permissions', 'role_id', 'menu_id')->withPivot('permission_id');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_menu_permissions', 'role_id', 'permission_id')->withPivot('menu_id');
    }

    public function users()
    {
        return $this->belongsToMany(add_user::class, 'userroles', 'role_id', 'employee_id');
    }
}
