<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class add_user extends Authenticatable
{

    use HasFactory;

    protected $table = 'add_users';
    protected $fillable = [
        'password',
        'user_name',
        'employee_id',
        'expiry_date',
        'status'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'userroles', 'employee_id', 'role_id');
    } 
    
    public function employee(){
        // return $this->belongsTo(Employee::class,'employee_id');
        return $this->belongsTo(Employee::class);
    }

    
}
