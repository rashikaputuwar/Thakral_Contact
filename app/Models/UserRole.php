<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'userroles';
    protected $fillable =([ 
        'employee_id',
        'role_id'
    ]);

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function user()
    {
        return $this->belongsTo(add_user::class, 'employee_id');
    }
}
