<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable =([ 
        'button_name',
        'status'
    ]);

    public function menus(){
        return $this->belongsToMany(Menu::class,'menu_permissions', 'button_id', 'menu_id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class,'role_menu_permission', 'permission_id', 'role_id')->withPivot('menu_id');
    }
}
