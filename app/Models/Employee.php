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
        'gender',
        'desig_id',
        'dept_id',
        'dob',
        'join_date',
        'photo_blob',
    ];
    public function departments(){
        return $this->hasOne(Department::class,'id','dept_id');
    }

    public function designations(){
        return $this->hasOne(Designation::class,'id','desig_id');
    }
}
