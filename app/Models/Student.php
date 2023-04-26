<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Auth;
use App\Models\Point;


class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'school_id',
        'student_name',
        'class',
        'school_name',
        'address',
        'gender',
        'mobile',
        'other_phone',
        'parent_phone',
        'email',
        'specialized_register',
        'description',
        'status',
        'image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function importFromExcel($filename)
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
                'student_name' => $row[0],
                'class' => $row[1],
                'school_name' => $row[2],
                'address' => $row[3],
                'gender' => $row[4],
                'mobile' => $row[5],
                'other_phone' => $row[6],
                'parent_phone' => $row[7],
                'email' => $row[8],
                'specialized_register' => $row[9],
                'description' => $row[10],
                'status' => $row[11],
            ]);
        }
    }
    public static function countStudents()
    {
        $userId = Auth::user()->id;
        return Student::where('user_id', $userId)->count();
    }
    public function points()
    {
        return $this->hasMany(Point::class);
    }
    public function point()
    {
        return $this->hasOne(Point::class);
    }
}
