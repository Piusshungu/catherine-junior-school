<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Jobs\StudentsExcelProcess;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;


class StudentsController extends Controller
{
    public function index()
    {

        return view('admin.manage-students', [

            'students' => Student::orderBy('full_name')->filter(request(['search']))

            ->paginate(7)->withQueryString(),
        ]);
    }

    public function studentProfile()
    {

        return view('student-profile');
    }


    public function registerNewStudent()
    {

        $attributes = request()->validate([

            'full_name' => 'required|max:255',
            'registration_number' => 'required|max:255',
            'phone_number' => 'required|max:13',
            'dob' => 'required',
        ]);

        $studentDetails = Student::create($attributes);

        return redirect('/students')->with('success', 'Student records successfully saved');
    }

   
    public function editStudentDetails($id)
    {
        
        $student = Student::find($id);

        $student->update();

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
