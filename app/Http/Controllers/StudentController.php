<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
use parentheses;
use Illuminate\Support\Facades\Storage;

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
        $point = Point::all();
        $student = Student::with('user')->get();
        $student = Student::with('point')->get();
        $student = Student::where('user_id', auth()->id())->orderBy('student_name', 'asc')->paginate(20);
        return view('student.index', compact('student', 'user', 'point'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.create');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $point = Student::with('points')->find($student->id);
        return view('student.update', compact('student', 'point'));
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
        $input = $request->all();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($student->image) {
            // Get the path to the old image
            $oldImagePath = public_path('img').$student->image;

            // Delete the old image
            Storage::delete($oldImagePath);
        }
        if($image=$request->file('image')){
            $destinationPath=public_path('img/student');
            $studentImage=date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$studentImage);
            $input['image']=$studentImage;
        }else{
            unset($input['image']);
        }

        // $student->update($request->all());
        $student->update($input);
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
        if ($student->points->count() > 0) {
            $student->point->delete();
        }

        $student->delete();
        return redirect()->back()->with('notification', 'Successfully deleted account');
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
        return view('student.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        $filename = $request->file('file')->getRealPath();
        Student::importFromExcel($filename);

        return redirect()->route('student.index')->with('notification', 'Students imported successfully!');
    }

    public function search(Request $request)
    {
        $user = User::all();
        $point = Point::all();
        $query = $request->input('query');
        $student = Student::where('student_name', 'LIKE', '%' . $query . '%')
            ->orWhere('mobile', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('status', 'LIKE', '%' . $query . '%')
            ->paginate(20);

        return  view('student.index', compact('student', 'user', 'point', 'query'));
    }

    public function filter(Request $request)
    {
        if(Auth::user()->role=="Admin"){
            $user_id = auth()->id();
            $user = User::all();
            $query = $request->input('student_name');
            $query_school_name = $request->input('school_name');
            $query_phone = $request->input('mobile');
            $query_email = $request->input('email');
            $query_register = $request->input('specialized_register');
            $query_status = $request->input('status');
            $query_exam_block = $request->input('exam_block');
            $query_points_min = $request->input('points_min');
            $query_points_max = $request->input('points_max');

            $student = Student::leftJoin('points', 'students.id', '=', 'points.student_id')
                ->select('students.*', 'points.recruitment_points')
                ->where(function ($queryBuilder) use ($query, $query_school_name, $query_phone, $query_email, $query_register, $query_status, $query_points_min, $query_points_max, $query_exam_block) {
                    if (!empty($query)) {
                        $queryBuilder->where('student_name', 'like', "%$query%")
                            ->orWhere('school_name', 'like', "%$query%")
                            ->orWhere('mobile', 'like', "%$query%")
                            ->orWhere('email', 'like', "%$query%")
                            ->orWhere('specialized_register', 'like', "$query")
                            ->orWhere('status', 'like', "$query");
                    }
                    if (!empty($query_phone)) {
                        $queryBuilder->where('mobile', $query_phone);
                    }
                    if (!empty($query_school_name)) {
                        $queryBuilder->where('school_name', $query_school_name);
                    }
                    if (!empty($query_email)) {
                        $queryBuilder->where('email', $query_email);
                    }
                    if (!empty($query_register)) {
                        $queryBuilder->where('specialized_register', $query_register);
                    }
                    if (!empty($query_status)) {
                        $queryBuilder->where('status', $query_status);
                    }
                    if (!empty($query_exam_block)) {
                        $queryBuilder->where('points.exam_block', 'like', $query_exam_block);
                    }
                    if (!empty($query_points_min)) {
                        $queryBuilder->where('points.recruitment_points', '>=', $query_points_min);
                    }
                    if (!empty($query_points_max)) {
                        $queryBuilder->where('points.recruitment_points', '<=', $query_points_max);
                    }
                })
                ->orderBy('students.id')
                ->paginate(20);
        }
        else{
            $user_id = auth()->id();
            $user = User::all();
            $query = $request->input('student_name');
            $query_school_name = $request->input('school_name');
            $query_phone = $request->input('mobile');
            $query_email = $request->input('email');
            $query_register = $request->input('specialized_register');
            $query_status = $request->input('status');
            $query_exam_block = $request->input('exam_block');
            $query_points_min = $request->input('points_min');
            $query_points_max = $request->input('points_max');

            $student = Student::leftJoin('points', 'students.id', '=', 'points.student_id')
                ->select('students.*', 'points.recruitment_points')
                ->where('user_id', $user_id)
                ->where(function ($queryBuilder) use ($query, $query_school_name, $query_phone, $query_email, $query_register, $query_status, $query_points_min, $query_points_max, $query_exam_block) {
                    if (!empty($query)) {
                        $queryBuilder->where('student_name', 'like', "%$query%")
                            ->orWhere('school_name', 'like', "%$query%")
                            ->orWhere('mobile', 'like', "%$query%")
                            ->orWhere('email', 'like', "%$query%")
                            ->orWhere('specialized_register', 'like', "$query")
                            ->orWhere('status', 'like', "$query");
                    }
                    if (!empty($query_phone)) {
                        $queryBuilder->where('mobile', $query_phone);
                    }
                    if (!empty($query_school_name)) {
                        $queryBuilder->where('school_name', $query_school_name);
                    }
                    if (!empty($query_email)) {
                        $queryBuilder->where('email', $query_email);
                    }
                    if (!empty($query_register)) {
                        $queryBuilder->where('specialized_register', $query_register);
                    }
                    if (!empty($query_status)) {
                        $queryBuilder->where('status', $query_status);
                    }
                    if (!empty($query_exam_block)) {
                        $queryBuilder->where('points.exam_block', 'like', $query_exam_block);
                    }
                    if (!empty($query_points_min)) {
                        $queryBuilder->where('points.recruitment_points', '>=', $query_points_min);
                    }
                    if (!empty($query_points_max)) {
                        $queryBuilder->where('points.recruitment_points', '<=', $query_points_max);
                    }
                })
                ->orderBy('students.id')
                ->paginate(20);
        }

        $student->appends(request()->query());
        return view('student.index', compact('student', 'user', 'query'));
    }

    public function show(Student $student)
    {
        //
        $point = Student::with('points')->find($student->id);
        return view('student.details', compact('student', 'point'));
    }
}
