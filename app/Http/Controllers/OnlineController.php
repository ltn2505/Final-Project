<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Point;
use App\Mail\WelcomeEmail;
use App\Mail\UserMail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class OnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('online.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Mail::to($student->email)->send(new WelcomeEmail($student));
        Mail::to($student->user->email)->send(new UserMail($student));

        return redirect()->route('online.index')->with('notification', 'Successfully added new.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

