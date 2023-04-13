<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
use parentheses;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        $student = Student::with('school')->get();
        $student = Student::with('user')->get();
        $student = Student::paginate(50);
        return view('student.index', compact('student', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $school = School::all();
        return view('student.create', compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student, Point $point)
    {
        //
        $student = Student::create($request->all());
        $point = new Point([
            'student_id' => $student->id,
            'recruitment_method' => $request->input('recruitment_method'),
            'exam_block' => strtoupper($request->input('exam_block')),
            'recruitment_points' => $request->input('recruitment_points'),
        ]);
        $point->save();
        return redirect()->route('student.index')->with('notification', 'Successfully added new.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $school = School::all();
        $point = Student::with('points')->find($student->id);
        return view('student.update', compact('student', 'school', 'point'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //

        $student->update($request->all());
        if ($student->points->count() > 0) {
            $student->points[0]->update([
                'recruitment_method' => $request->input('recruitment_method'),
                'exam_block' => strtoupper($request->input('exam_block')),
                'recruitment_points' => $request->input('recruitment_points'),
            ]);
        } else {
            $point = new Point([
                'student_id' => $student->id,
                'recruitment_method' => $request->input('recruitment_method'),
                'exam_block' => strtoupper($request->input('exam_block')),
                'recruitment_points' => $request->input('recruitment_points'),
            ]);
            $point->save();
        }


        return redirect()->route('student.edit', $student->id)->with('notification', 'Successfully edited account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->route('student.index')->with('notification', 'Successfully deleted account');
    }

    public function transform(Request $request)
    {
        $studentID = $request->studentID;
        $userID = $request->user_id;

        foreach ($studentID as $student) {
            $st = Student::find($student);

            $st->user_id = $userID;
            $st->save();
        }

        return redirect()->back();
    }

    public function importForm()
    {
        $school = School::all();
        return view('student.import', compact('school'));
    }

    public function import(Request $request)
    {
        $schoolId = $request->input('school');
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $filename = $request->file('file')->getRealPath();
        Student::importFromExcel($filename, $schoolId);

        return redirect()->route('student.index')->with('notification', 'Students imported successfully!');
    }

    public function chart()
    {
        $statuses = Student::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->pluck('total', 'status');

        $data = [
            'labels' => $statuses->keys(),
            'datasets' => [
                [
                    'label' => 'Students by status',
                    'data' => $statuses->values(),
                    'backgroundColor' => ['#36a2eb', '#ff6384', '#4bc0c0', '#ffcd56'],
                ],
            ],
        ];

        $userId = Auth::id();

        $student_byId = Student::select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->get()
            ->pluck('total', 'user_id');

        $userNames = User::whereIn('id', $student_byId->keys())->pluck('name', 'id');

        $data1 = [
            'labels' =>  $userNames->values(),
            'datasets' => [
                [
                    'label' => 'Students by user',
                    'data' => $student_byId->values(),
                    'backgroundColor' => ['#36a2eb', '#ff6384', '#4bc0c0', '#ffcd56'],
                ],
            ],
        ];


        return view('student.chart', compact('data', 'data1'));
    }
}
