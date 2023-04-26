<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $user = User::all();
        $choose_user = $request->input('user_id');
        $user_id = auth()->id();
        if (Auth::user()->role == "Admin"){
            $count = Student::where('user_id', $choose_user)->count();
        }
        else{
            $count = Student::countStudents();
        }


        if (!$choose_user) {
            $choose_user = $user->first()->id;
        }

        // Get the selected user's name
        $selectedUserName = User::findOrFail($choose_user)->name;

        if (Auth::user()->role == "Admin") {
            // Get the count of all students for the selected user
            $totalStudents = Student::where('user_id', $choose_user)->count();
            $specializedRegisters = DB::table('students')
                ->select('specialized_register', DB::raw('count(*) as total'))
                ->where('user_id', $choose_user)
                ->groupBy('specialized_register')
                ->get();
        }
        else{
            $totalStudents = Student::where('user_id', $user_id)->count();
            $specializedRegisters = DB::table('students')
                ->select('specialized_register', DB::raw('count(*) as total'))
                ->where('user_id', $user_id)
                ->groupBy('specialized_register')
                ->get();
        }




        // Define the data for the pie chart
        $labels = $specializedRegisters->pluck('specialized_register')->toArray();
        $dataPoints = $specializedRegisters->pluck('total')->toArray();

        // Define the dataset for the pie chart
        $datasets = [
            [
                'data' => $dataPoints,
                'backgroundColor' => ['#ff6384', '#36a2eb', '#ffcd56', '#4bc0c0', '#070A52', '#ECC9EE', '#957777'],
            ]
        ];

        // Define the data for the pie chart
        $data = [
            'labels' => $labels,
            'datasets' => $datasets,
        ];


        //bar chart
        // Get the count of students based on their status
        if (Auth::user()->role == "Admin"){
            $statusCounts = DB::table('students')->select('status', DB::raw('count(*) as count'))
            ->where('user_id', $choose_user)
            ->groupBy('status')
            ->get();
        }else{
            $statusCounts = DB::table('students')->select('status', DB::raw('count(*) as count'))
            ->where('user_id', $user_id)
            ->groupBy('status')
            ->get();
        }


        // Extract the status and count values from the query result
        $statuses = $statusCounts->pluck('status')->toArray();
        $countValues = $statusCounts->pluck('count')->toArray();

        // Define the chart data
        $colors = ['#0000FF ', '#008080  ', '#00CED1  ', '#ADD8E6  ', '#87CEEB  ', '#6A5ACD  ', '#4682B4   '];
        $data1 = [
            'labels' => $statuses,
            'datasets' => [
                [
                    'label' => 'Student status',
                    'backgroundColor' => $colors,
                    'data' => $countValues,

                ],
            ],
        ];

        $todos = Todo::where('user_id', auth()->id())->get();
        $todos = Todo::where('user_id', auth()->id())->paginate(3);
        return view('home', ['count' => $count], compact('user', 'data', 'data1', 'todos'));
    }
}
