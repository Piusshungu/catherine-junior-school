<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        return view('subjects.index', [

            'subjects' => Subject::all(),
        ]);
    }

    public function createSubject()
    {
        $classData = request()->validate([

            'name' => 'required',
        ]);

        $classData = Subject::create($classData);

        if(request()->levels){

            foreach(request()->levels as $level){

                $classData->levels()->attach($level);
            }
        }

        return redirect('/levels')->with('success', 'Subject records successfully added');
    }
}
