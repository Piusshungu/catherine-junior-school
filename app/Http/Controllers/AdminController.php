<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        
        $male = Student::where('gender', 'male')->count();

        $female = Student::where('gender', 'female')->count();

        return view('admin.dashboard', compact('male', 'female'));
    }
}
