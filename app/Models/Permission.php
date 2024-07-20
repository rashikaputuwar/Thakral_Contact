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
        return $this->belongsToMany(Menu::class,'menus','permission_id','menu_id');
    }
}
