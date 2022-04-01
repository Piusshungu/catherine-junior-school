<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        
        $male = Student::where('gender', 'male')->count();

        $female = Student::where('gender', 'female')->count();

        return view('admin.dashboard', compact('male', 'female'));
    }

    // public function staffGenderSummary()
    // {
    //     $maleStaff = User::where('gender', 'male')->count();

    //     $femaleStaff = User::where('gender', 'female')->count();

    //     return view('admin.dashboard', compact('maleStaff', 'femaleStaff'));

    // }
}
