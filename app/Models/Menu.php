<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';

    protected $fillable = ['menu_id', 'menu_name','status'];

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'menu_permissions','menu_id', 'button_id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_menu_permissions', 'menu_id', 'role_id')->withPivot('permission_id');
    }

}
