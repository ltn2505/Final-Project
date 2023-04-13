<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Point extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'recruitment_method',
        'exam_block',
        'recruitment_points',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
