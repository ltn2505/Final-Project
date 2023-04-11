<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;

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
        $student = Student::with('school')->get();
        $student = Student::with('user')->get();
        $student=Student::paginate(50);
        return view('student.index',compact('student'));
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
        return view('student.create',compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Student::create($request->all());
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
        return view('student.update',compact('student','school'));
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
        return redirect()->route('student.edit',$student->id)->with('notification','Successfully edited account');
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
        return redirect()->route('student.index')->with('notification','Successfully deleted account');
    }

    public function importForm()
    {
        $school = School::all();
        return view('student.import',compact('school'));
    }

    public function import(Request $request)
    {
        $schoolId = $request->input('school');
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $filename = $request->file('file')->getRealPath();
        Student::importFromExcel($filename,$schoolId);

        return redirect()->route('student.index')->with('notification', 'Students imported successfully!');
    }
}
