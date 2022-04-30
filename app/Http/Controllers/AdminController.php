<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        
        $male = Student::where('gender', 'male')->count();

        $male = json_encode($male);

        $female = Student::where('gender', 'female')->count();

        $female = json_encode($female);

        $maleStaff = User::where('gender', 'male')->count();

        $maleStaff = json_encode($maleStaff);

        $femaleStaff = User::where('gender', 'female')->count();

        $femaleStaff = json_encode($femaleStaff);

        $totalStaff = $femaleStaff + $maleStaff;

        $totalStaff = json_encode($totalStaff);

        return view('admin.dashboard', compact('male', 'female', 'femaleStaff', 'maleStaff', 'totalStaff'));
    }
}
