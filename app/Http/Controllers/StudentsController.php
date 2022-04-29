<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Jobs\StudentsExcelProcess;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Models\Level;
use Maatwebsite\Excel\Facades\Excel;


class StudentsController extends Controller
{
    public function index()
    {

        return view('admin.manage-students', [

            'students' => Student::orderBy('first_name')->filter(request(['search']))

            ->paginate(7)->withQueryString(),
        ]);
    }

    public function studentProfile($id)
    {

        return view('student-profile',[

            'student' => Student::find($id),

            'levels' => Level::all(),
        ]);
    }


    public function registerNewStudent()
    {

        $attributes = request()->validate([

            'name' => 'required|max:255',
            'registration_number' => 'required|max:255',
            'phone_number' => 'required|max:13',
            'dob' => 'required',
            'registration_year' => 'required',
            'gender' => 'required|in:male,female',

        ]);

        $name = explode(" ", $attributes['name'], 2);

        $first_name = $name[0];

        $last_name = !empty($name[1]) ? $name[1] : '';

        $data= [
            "first_name" => $first_name,
            "last_name" => $last_name,
            "registration_number" => $attributes['registration_number'],
            "phone_number" => $attributes['phone_number'],
            "registration_year" => $attributes['registration_year'],
            "gender" => $attributes['gender'],
            "dob" => $attributes['dob'],
        ];

        $studentDetails = Student::create($data);

        return redirect('/students')->with('success', 'Student records successfully saved');
    }

   
    public function editStudentDetails($id)
    {
        
        request()->validate([

            'phone_number' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'level_id' => 'required',
            'gender' => 'required',
            'registration_number' => 'required',
            'dob' => 'required',
            'registration_year' => 'required'
        ]);

        $input = request()->all();

        $student = Student::find($id);

        dd($student);

        $student->update($input);

        return redirect('/students')->with('success', 'Student records successfully updated');
    }


    public function deleteStudentRecords($id)
    {

        $student = Student::find($id);
        
        $student->delete();

        return redirect('/students')->with('success', 'Student records successfully deleted');
    }

    public function importStudentsView()
    {

        return view('students-import');
    }

    public function exportStudentsDetails()
    {

        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function importStudentsDetails()
    {
        $studentsData = request()->validate([
            
            'file' => 'required',
        ]);

        Excel::import(new StudentsImport,request()->file('file'));

        return redirect('/students')->with('success', 'Students records successfully uploaded');

        // StudentsExcelProcess::dispatch($studentsData);
    }
}
