<?php

namespace App\Http\Controllers;

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
}
