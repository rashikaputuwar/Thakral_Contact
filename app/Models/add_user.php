<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_user extends Model
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

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

}
