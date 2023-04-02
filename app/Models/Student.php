<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'school_id',
        'student_name',
        'class',
        'gender',
        'mobile',
        'orther_phone',
        'parent_phone',
        'email',
        'specialized_register',
        'description',
        'status',
    ];
}
