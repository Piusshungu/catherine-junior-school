<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        return view('subjects.index', [

            'subjects' => Subject::with('levels')->orderBy('subject_name')
            
            ->filter(request(['search']))->get(),
        ]);
    }

    public function subjectCreateForm()
    {
        return view('subjects.create',[

            'levels' => Level::all(),
        ]);
    }

    public function createSubject()
    {
        $classData = request()->validate([

            'subject_name' => 'required|unique:subjects,subject_name',

            'levels' => 'required'
        ]);

        $classData = Subject::create($classData);

        if(empty(request()->input('levels'))){

            return redirect('/subjects/create')->with('error', 'A subject must contains at least one class');

        }
        elseif(request()->levels){
            
            foreach(request()->levels as $level){

                $classData->levels()->attach($level);
            }
        }

        return redirect('/subjects/create')->with('success', 'Subject records successfully added');
    }

    public function getStudentsInParticularSubject($id)
    {
        $subjects = Subject::find($id);

        return view('subjects.classes', compact('subjects'));
    }
}
