<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $users = User::all();

        $classes = Level::with('user')->orderBy('class')
        
        ->filter(request(['search']))->get();

        return view('classes.index', compact('users', 'classes'));
    }

    public function createClassForm()
    {
        return view('classes.create', [

            'teachers' => User::where('type', 'Teacher')->get(),
        ]);
    }

    public function createClass()
    {
        $classDetails = request()->validate([

            'class' => 'required',

            'stream' => 'required',

            'user_id' => 'required'
        ]);

        $saveClass = Level::create($classDetails);

        return redirect('/classes')->with('success', 'Class Records Added');
    }

    public function getStudentsInParticularSubject($id)
    {
        $students = Level::with('students')->find($id);

        return view('classes.students', compact('students'));
    }
}
