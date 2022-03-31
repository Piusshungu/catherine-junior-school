<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        return view('classes.index',[

            'users' => User::all(),

            // 'classes' => Level::all(),
        ]);
    }

    public function createClassForm()
    {
        return view('classes.create', [

            'teachers' => User::all(),
        ]);
    }

    public function createClass()
    {
        $classDetails = request()->validate([

            'class' => 'required|unique:levels,class',
            'stream' => 'required',
            'class_teacher' => 'required',
            'level'=> 'required'
        ]);
    }
}
