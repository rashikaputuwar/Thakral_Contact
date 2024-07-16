<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    protected $fillable = [
        'emp_code',
        'fname',
        'lname',
        'email',
        'gender',
        'desig_id',
        'dept_id',
        'dob',
        'join_date',
        'photo_blob',
    ];

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return "{$this->fname} {$this->lname}";
    }
    public function departments(){
        return $this->hasOne(Department::class,'id','dept_id');
    }

    public function designations(){
        return $this->hasOne(Designation::class,'id','desig_id');
    }

    public function users()
    {
        return $this->hasMany(add_user::class, 'employee_id');
    }
}
