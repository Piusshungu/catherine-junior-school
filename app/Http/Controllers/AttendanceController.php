<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(){

        return view('attendance.index',[
            
            'students' => Student::orderBy('first_name')->filter(request(['search']))

            ->paginate(7)->withQueryString(),
        ]);
    }

    public function recordAttendance($id)
    {
        request()->validate([

            'student_id' => 'required',

            'status' => 'required',

            'date' => 'required'
        ]);

        $students = Student::where('id', 'id')->get();

        $studentsAttendance = [];

        foreach($students as $student){

            array_push($studentsAttendance, $student->$id);
        }

        $studentsAttendance = request()->all();

        $saveAttendance = Attendance::create($studentsAttendance);
    }
}
