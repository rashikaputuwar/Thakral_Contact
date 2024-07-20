<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';

    protected $fillable = ['menu_id', 'menu_name'];

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'permission_id', 'menu_id');
    }

}
