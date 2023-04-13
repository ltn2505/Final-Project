<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Auth;
use App\Models\Point;
use Illuminate\Foundation\Auth\User as AuthUser;

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
        'other_phone',
        'parent_phone',
        'email',
        'specialized_register',
        'description',
        'status',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function importFromExcel($filename,$schoolId)
    {
        $inputFileType = IOFactory::identify($filename);
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($filename);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();

        array_shift($rows);

        foreach ($rows as $row) {
            Student::create([
                'user_id' => Auth::user()->id,
                'school_id' => $schoolId,
                'student_name' => $row[0],
                'class' => $row[1],
                'gender' => $row[2],
                'mobile' => $row[3],
                'other_phone' => $row[4],
                'parent_phone' => $row[5],
                'email' => $row[6],
                'specialized_register' => $row[7],
                'description' => $row[8],
                'status' => $row[9],

            ]);
        }
    }
    public static function countStudents()
    {
        return self::count();
    }
    public function points()
    {
        return $this->hasMany(Point::class);
    }

}
