<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AttendanceController extends Controller
{
    public function index(){

        return view('attendance.index',[
            
            'students' => Student::orderBy('first_name')->filter(request(['search']))

            ->paginate(7)->withQueryString(),
        ]);
    }

    public function recordAttendance()
    {
        foreach(request()->attendences as $attendence){

        $attendence = new Request(array_merge($attendence, ['date'=>date("Y-m-d", strtotime(request()->date))]));
        
        $attendence->validate([

            'student_id' => 'required',

            'status' => 'required',

            'date' => 'required'
        ]);

        $save =  Attendance::create($attendence->all());
        
        }

        return redirect('/attendance')->with('success', 'Attendance successfully marked');
    }
        
    
}
